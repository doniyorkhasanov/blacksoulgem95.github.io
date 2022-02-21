import {ulid} from "ulid";
import chalk from "chalk";
import clear from "clear";
import figlet from "figlet";
import path from "path";

import {
    askAuthor,
    askCategories,
    askDate, askDescription, askExcerpt,
    askForContent,
    askIfFeatured,
    askLanguage,
    askName,
    askTags
} from "./lib/inquirer.mjs"
import slug from "./lib/slug.mjs";
import {fileURLToPath} from "url";
import * as fs from "fs";

const __filename = fileURLToPath(import.meta.url);

const __dirname = path.dirname(__filename);

async function execute() {

    clear();

    console.log(
        chalk.redBright(
            figlet.textSync('New Category', {horizontalLayout: 'full'})
        )
    );


    const {name} = await askName('category')
    const slugged = slug(name)
    const filename = `${slugged}.md`
    const filepath = path.join(__dirname, 'source', '_categories', filename)
    console.log(
        chalk.green(
            'Generated Slug', chalk.cyan(slugged)
        )
    )
    console.log(
        chalk.green(
            'Generated fileName', chalk.cyan(filename)
        )
    )

    console.debug(
        chalk.green(
            "You've selected the name: ", chalk.redBright(name)
        )
    );

   const {description} = await askDescription()

    console.debug(
        chalk.green(
            "You've selected the description: ", chalk.redBright(description)
        )
    );

    const {content} = await askForContent()

    console.log(
        chalk.bold(
            "📜", "The content is\n", chalk.cyan(content)
        )
    )

    // touch the file
    fs.closeSync(fs.openSync(filepath, 'w'));

    const meta = `---
extends: _layouts.category
section: content
title: ${name}
slug: ${slugged}
description: ${description}
---\n`

    await fs.promises.appendFile(filepath, meta)
    console.debug('created metadata')
    await fs.promises.appendFile(filepath, content)
    console.log(
        chalk.greenBright("Enjoy your category!", filepath)
    )


}

execute()