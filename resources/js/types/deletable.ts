import { Identifiable } from './identifiable';

export interface Deletable extends Identifiable{
    name?: string;
    company_name?: string;
    title?: string;
}