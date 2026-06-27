import { Skill } from './skill';
import { ProjectImage } from './projectImage';

export interface Project {
    id: number,
    name: string,
    description: string,
    start_date: string,
    end_date: string,
    github_url?: string,
    live_link_url?: string,
    // skills?: Pick<Skill, 'id' | 'name'>[];
    skills?: Skill[],
    project_images?: ProjectImage[],
}