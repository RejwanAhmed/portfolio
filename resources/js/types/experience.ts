export interface Experience {
    id: number,
    company_name: string,
    job_title: string,
    start_date: string,
    end_date?: string,
    description?: string,
    responsibilities?: string[];
}