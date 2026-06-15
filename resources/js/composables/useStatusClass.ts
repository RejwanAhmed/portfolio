export const useStatusClass = (status: string) => {
    const map: Record<string, string> = {
        saved:     'bg-gray-500 text-white',
        applied:   'bg-blue-500 text-white',
        offer:     'bg-yellow-500 text-white',
        accepted:  'bg-emerald-500 text-white',
        rejected:  'bg-rose-500 text-white',
        withdrawn: 'bg-purple-500 text-white',
    }
    return map[status] ?? 'bg-gray-500 text-white'
}