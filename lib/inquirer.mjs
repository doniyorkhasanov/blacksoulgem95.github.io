import inquirer from "inquirer";

//@ts-ignore
import idp from "inquirer-datepicker-prompt";
import {getCategories} from "./data.mjs";

//@ts-ignore
inquirer.registerPrompt("date", idp);

export const askName = (entity) => {
    const questions = [
        {
            name: "name",
            type: "input",
            message: "What is the name of this " + entity || "post",
            prefix: "🏷",
            validate: function (value) {
                if (value.length) {
                    return true;
                } else {
                    return 'Please enter a value.';
                }
            }
        }
    ]
    return inquirer.prompt(questions)
}
export const askTags = () => {
    const questions = [
        {
            name: "tags",
            type: "input",
            message: "Comma separated list of tags",
            prefix: "🏷",
            validate: function (value) {
                if (value.length) {
                    return true;
                } else {
                    return 'Please enter a value.';
                }
            }
        }
    ]
    return inquirer.prompt(questions)
}

export const askDate = (question = "What is the date?", format = ['d', '/', 'm', '/', 'yy', ' ', 'h', ':', 'MM', ' ', 'TT']) => {
    const questions = [
        {
            name: "date",
            type: "date",
            prefix: "📅",
            message: question,
            format
        }
    ]
    return inquirer.prompt(questions)
}

export const askCategories = async () => {
    const categories = await getCategories()
    const questions = [
        {
            name: "categories",
            type: "checkbox",
            message: "Which categories does this post belong to?",
            prefix: "🌍",
            choices: categories.map(c => {
                return {value: c.id, name: c.name}
            })
        }
    ]
    return inquirer.prompt(questions)
}

export const askForCoverImage = (id) => {

    const questions = [
        {
            name: "coverImage",
            type: "input",
            message: "/assets/img/" + id + "/",
            prefix: "Cover Image",
        }
    ]
    return inquirer.prompt(questions)
}

export const askAuthor = () => {
    const questions = [
        {
            name: "author",
            type: "input",
            message: "Who is the Author?",
            prefix: "👩",
            validate: function (value) {
                if (value.length) {
                    return true;
                } else {
                    return 'Please enter a value.';
                }
            }
        }
    ]
    return inquirer.prompt(questions)

}

export const askLanguage = () => {
    const questions = [
        {
            name: "language",
            type: "list",
            message: "Which language?",
            prefix: "🌍",
            default: 0,
            choices: [
                "English",
                "Italian"
            ]
        }
    ]
    return inquirer.prompt(questions)
}

export const askIfFeatured = () => {
    const questions = [
        {
            name: "featured",
            type: "confirm",
            message: "Is featured?",
            prefix: '🔝'
        }
    ]

    return inquirer.prompt(questions)
}

export const askForContent = () => {

    const questions = [
        {
            name: "content",
            type: "editor",
            message: "let's make this rock",
            prefix: '🔝'
        }
    ]

    return inquirer.prompt(questions)
}

export const askDescription = () => {
    const questions = [
        {
            name: "description",
            type: "input",
            message: "Describe this post",
            prefix: "💭",
            validate: function (value) {
                if (value.length) {
                    return true;
                } else {
                    return 'Please enter a value.';
                }
            }
        }
    ]
    return inquirer.prompt(questions)

}

export const askExcerpt = () => {

    const questions = [
        {
            name: "excerpt",
            type: "input",
            message: "An excerpt for this article",
            prefix: "📜",
            validate: function (value) {
                if (value.length) {
                    return true;
                } else {
                    return 'Please enter a value.';
                }
            }
        }
    ]
    return inquirer.prompt(questions)
}