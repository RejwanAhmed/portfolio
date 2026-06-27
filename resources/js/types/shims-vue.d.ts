// resources/js/shims-vue.d.ts
declare module '*.css';
declare module '*.vue' {
  import type { DefineComponent } from 'vue'
  const component: DefineComponent<{}, any, any>
  export default component
}
