export interface JobApplication {
    id: number,
    company_name: string,
    title: string,
    application_date: string,
    status: string,
    description?: string,
    salary_min?: number,
    salary_max?: number,
    job_url?: string,
    source?: string,
    location?: string,
}

export interface PhaseModalState {
    show: boolean;
    id: number | null;
    title: string;
}