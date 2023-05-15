import { defineConfig } from "unocss";
import presetWind from "@unocss/preset-wind";
import transformerDirectives from "@unocss/transformer-directives";
import transformerVariantGroup from "@unocss/transformer-variant-group";
import presetRemToPx from "@unocss/preset-rem-to-px";
import presetTagify from "@unocss/preset-tagify";
import presetMini from "@unocss/preset-mini";
import presetWebFonts from "@unocss/preset-web-fonts";
import presetUno from "@unocss/preset-uno";
import presetAttributify from "@unocss/preset-attributify";
import { presetTypography } from "unocss";
import { presetScrollbar } from "unocss-preset-scrollbar";

export default defineConfig({
    presets: [
        presetUno(),
        presetWind(),
        presetMini(),
        presetWebFonts({
            fonts: {
                sans: "Prata",
                serif: "DM Serif Display",
                mono: "DM Mono",
            },
        }),
        presetTagify({
            /* options */
        }),
        presetScrollbar({
            // config
        }),
        presetTypography(),
        presetAttributify({
            /* preset options */
        }),
    ],
});
