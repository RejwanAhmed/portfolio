export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at?: string;
    phone?: string;
    address?: string;
    short_description?: string;
    long_description?: string;
    linked_in_url?: string;
    github_url?: string;
    landing_image_url?: string;
    about_me_image_url?: string;
}