import _ from "lodash";

function load(app, components, start = "", end = "") {
    Object.entries(components).forEach(([path, definition]) => {
        const componentName =
            _.capitalize(start) +
            path
                .replace("/resources/js", "")
                .split("/")
                .map((v) => _.capitalize(v))
                .splice(2)
                .reduce((accumulator, currentValue) => {
                    return accumulator + currentValue;
                })
                .replace("..", "")
                .replace("Index", "")
                .replace(".vue", "") +
            (end ? _.capitalize(end) : "");
        // Register component on this Vue instance
        app.component(componentName, definition.default);
    });
}

const autoimportComponent = {
    install(app, options) {
        const BaseComponents = import.meta.globEager(
            "/resources/js/Components/**/*.vue"
        );
        console.log(BaseComponents);
        load(app, BaseComponents, "", "");
    },
};

export default autoimportComponent;
