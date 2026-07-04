export interface Blog {
    id: number,
    title: string,
    url: string,
    excerpt?: string,
    cover_image_url?: string,
    published_at: string,
    is_featured: boolean;
    is_visible: boolean;
}