<template>
    <div v-if="show" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto">

            <!-- Modal Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Phases — {{ jobApplicationTitle }}</h3>
                <button @click="closeModal" class="text-gray-400 hover:text-gray-600 transition">
                    <i class="bi bi-x-lg text-[16px]"></i>
                </button>
            </div>

            <div class="p-6 space-y-6">

                <!-- Add / Edit Phase Form -->
                <div class="bg-gray-50 rounded-lg p-4 space-y-4">
                    <h4 class="text-sm font-medium text-gray-700">{{ editingPhase ? 'Edit Phase' : 'Add New Phase' }}</h4>

                    <VForm @submit="submitPhase" class="space-y-4">
                        <div class="md:flex md:space-x-4">
                            <div class="md:w-1/2 w-full">
                                <label class="block text-sm font-medium text-gray-700">Phase Name <span class="text-red-500">*</span></label>
                                <Field type="text" name="phase_name" v-model="formData.phase_name"
                                    placeholder="Ex. Technical Interview"
                                    class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" />
                                <ErrorMessage :errorMessage="serverErrors.phase_name?.[0]" />
                            </div>

                            <div class="md:w-1/2 w-full mt-4 md:mt-0">
                                <label class="block text-sm font-medium text-gray-700">Scheduled At <span class="text-red-500">*</span></label>
                                <Field type="datetime-local" name="scheduled_at" v-model="formData.scheduled_at"
                                    class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" />
                                <ErrorMessage :errorMessage="serverErrors.scheduled_at?.[0]" />
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Outcome</label>
                            <Field as="select" name="outcome" v-model="formData.outcome"
                                class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200">
                                <option value="pending">Pending</option>
                                <option value="passed">Passed</option>
                                <option value="failed">Failed</option>
                            </Field>
                            <ErrorMessage :errorMessage="serverErrors.outcome?.[0]" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Notes</label>
                            <Field as="textarea" name="notes" v-model="formData.notes" rows="3"
                                placeholder="Any notes about this phase..."
                                class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200 resize-none" />
                            <ErrorMessage :errorMessage="serverErrors.notes?.[0]" />
                        </div>

                        <div class="flex justify-end gap-2">
                            <button v-if="editingPhase" type="button" @click="cancelEdit"
                                class="px-4 py-2 text-sm border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 transition">
                                Cancel
                            </button>
                            <button type="submit" :disabled="processing"
                                class="px-4 py-2 text-sm bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition disabled:opacity-50">
                                {{ processing ? 'Saving...' : editingPhase ? 'Update Phase' : 'Add Phase' }}
                            </button>
                        </div>
                    </VForm>
                </div>

                <!-- Timeline -->
                <div v-if="phases.length > 0">
                    <h4 class="text-sm font-medium text-gray-700 mb-4">Timeline</h4>
                    <div class="relative">
                        <div class="absolute left-3.5 top-0 bottom-0 w-px bg-gray-200"></div>

                        <div class="space-y-6">
                            <div v-for="phase in phases" :key="phase.id" class="relative flex gap-4">
                                <!-- Dot -->
                                <div :class="outcomeDot(phase.outcome)" class="relative z-10 flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center mt-0.5">
                                    <i v-if="phase.outcome === 'passed'" class="bi bi-check text-white text-[14px]"></i>
                                    <i v-else-if="phase.outcome === 'failed'" class="bi bi-x text-white text-[14px]"></i>
                                    <span v-else class="h-2 w-2 rounded-full bg-white"></span>
                                </div>

                                <!-- Content -->
                                <div class="flex-1 bg-white border border-gray-200 rounded-lg p-4">
                                    <div class="flex items-start justify-between gap-2">
                                        <div>
                                            <p class="text-sm font-medium text-gray-800">{{ phase.phase_name }}</p>
                                            <p class="text-xs text-gray-500 mt-0.5">{{ formatDateTime(phase.scheduled_at) }}</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span :class="outcomeClass(phase.outcome)" class="text-xs font-medium px-2 py-0.5 rounded-full capitalize">
                                                {{ phase.outcome }}
                                            </span>
                                            <button type="button" @click="startEdit(phase)" class="text-gray-400 hover:text-indigo-500 transition" title="Edit">
                                                <i class="bi bi-pencil text-[14px]"></i>
                                            </button>
                                            <button type="button" @click="deletePhase(phase.id)" class="text-gray-400 hover:text-rose-500 transition" title="Delete">
                                                <i class="bi bi-trash text-[14px]"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p v-if="phase.notes" class="text-xs text-gray-600 mt-2 border-t border-gray-100 pt-2">{{ phase.notes }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-else class="text-center py-6 text-sm text-gray-400">
                    No phases added yet.
                </div>

            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, watch } from 'vue'
import { Field, Form as VForm } from 'vee-validate'
import ErrorMessage from '@/Components/Message/ErrorMessage.vue'
import axios from 'axios'

const props = defineProps<{
    show: boolean
    jobApplicationId: number | null
    jobApplicationTitle?: string
}>()

const emit = defineEmits(['close'])

const phases = ref<any[]>([])
const editingPhase = ref<any>(null)
const serverErrors = ref<Record<string, string>>({})
const processing = ref(false)

const formData = ref({
    phase_name: '',
    scheduled_at: '',
    outcome: 'pending',
    notes: '',
})

const resetForm = () => {
    formData.value = { phase_name: '', scheduled_at: '', outcome: 'pending', notes: '' }
    serverErrors.value = {}
    editingPhase.value = null
}

const closeModal = () => {
    resetForm()
    emit('close')
}

const fetchPhases = async () => {
    if (!props.jobApplicationId) return
    const res = await axios.get(route('job-applications.phases.index', { 
        jobApplication: props.jobApplicationId 
    }))
    phases.value = res.data
}

const submitPhase = async () => {
    serverErrors.value = {}
    processing.value = true
    try {
        if (editingPhase.value) {
            await axios.put(route('job-applications.phases.update', {
                jobApplication: props.jobApplicationId,
                phase: editingPhase.value.id
            }), formData.value)
        } else {
            await axios.post(route('job-applications.phases.store', {
                jobApplication: props.jobApplicationId
            }), formData.value)
        }
        resetForm()
        await fetchPhases()
    } catch (error: any) {
        if (error.response?.status === 422) {
            serverErrors.value = error.response.data.errors
        }
    } finally {
        processing.value = false
    }
}

const startEdit = (phase: any) => {
    editingPhase.value = phase
    formData.value.phase_name = phase.phase_name
    formData.value.scheduled_at = phase.scheduled_at.slice(0, 16)
    formData.value.outcome = phase.outcome
    formData.value.notes = phase.notes ?? ''
}

const cancelEdit = () => resetForm()

const deletePhase = async (id: number) => {
    if (!confirm('Delete this phase?')) return
    await axios.delete(route('job-applications.phases.destroy', {
        jobApplication: props.jobApplicationId,
        phase: id
    }))
    await fetchPhases()
}

const formatDateTime = (dt: string) => {
    return new Date(dt).toLocaleString('en-US', {
        year: 'numeric', month: 'short', day: 'numeric',
        hour: '2-digit', minute: '2-digit'
    })
}

const outcomeDot = (outcome: string) => ({
    'bg-amber-400': outcome === 'pending',
    'bg-emerald-500': outcome === 'passed',
    'bg-rose-500': outcome === 'failed',
})

const outcomeClass = (outcome: string) => ({
    'bg-amber-100 text-amber-700': outcome === 'pending',
    'bg-emerald-100 text-emerald-700': outcome === 'passed',
    'bg-rose-100 text-rose-700': outcome === 'failed',
})

watch(() => props.show, async (val) => {
    if (val) await fetchPhases()
    else resetForm()
}, { immediate: true })
</script>