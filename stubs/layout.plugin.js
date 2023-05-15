const PLUGIN_NAME = "vite:inertia:layout";
const TEMPLATE_LAYOUT_REGEX =
    /<template +layout(?: *= *['"](?:(?:(\w+):)?(\w+))['"] *)?>/;

export default () => ({
    name: PLUGIN_NAME,
    transform(code, id) {
        if (!TEMPLATE_LAYOUT_REGEX.test(code)) {
            return;
        }

        const layouts = "@/layouts/";
        // const debug = createDebugger("vite:inertia:layout");
        const isTypeScript = /lang=['"]ts['"]/.test(code);

        return code.replace(
            /<template +layout *= *['"](\w+)['"] *>/,
            (_, layoutName) => {
                console.log(
                    `Using custom Inertia layout (${layoutName}) for SFC: ${id}`
                );
                console.log(`import layout from '${layouts}${layoutName}.vue'`);
                return `
					<script${isTypeScript ? ' lang="ts"' : ""}>
					import layout from '${layouts}${layoutName}.vue'
					export default { layout }
					</script>
					<template>
				`;
            }
        );
    },
});
