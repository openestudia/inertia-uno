import UnoCSS from "unocss/vite";
import AutoImport from "unplugin-auto-import/vite";

const compositionResolver = (name) => {
    const isCompositionApi = name.startsWith("use");
    if (isCompositionApi) {
        console.log(`@/Composables/${name}.js`);
        return `@/Composables/${name}.js`;
    }
};

export default function inertiaUnoPlugin() {
    return [
        UnoCSS(),
        AutoImport({
            imports: ["vue", "@vueuse/core"],
            resolvers: [compositionResolver],
            dts: "types/auto-imports.d.ts",
        }),
    ];
}
