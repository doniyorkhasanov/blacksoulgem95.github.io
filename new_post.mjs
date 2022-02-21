import {ulid} from "ulid";
import chalk from "chalk";
import clear from "clear";
import figlet from "figlet";
import path from "path";

import {
    askAuthor,
    askCategories,
    askDate, askDescription, askExcerpt,
    askForContent, askForCoverImage,
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

    const id = ulid();

    console.log(
        chalk.redBright(
            figlet.textSync('New Post', {horizontalLayout: 'full'})
        )
    );

    console.log(
        chalk.green(
            'Generated Sortable ID', chalk.cyan(id)
        )
    )

    const {name} = await askName('post')
    const slugged = slug(name)
    const filename = `${id}_${slugged}.md`
    const filepath = path.join(__dirname, 'source', '_posts', filename)
    const imgPath = path.join(__dirname, 'source', 'assets', 'img', id)
    const attachmentsPath = path.join(__dirname, 'source', 'assets', 'attachment', id)
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

    const {date} = await askDate("When was it posted?")

    console.debug(
        chalk.green(
            "You've selected the date: ", chalk.redBright(date)
        )
    );

    const {language} = await askLanguage()

    console.debug(
        chalk.green(
            "You've selected the language: ", chalk.redBright(language)
        )
    );

    const {categories} = await askCategories()

    console.debug(
        chalk.green(
            "You've selected the categories: ", chalk.redBright(categories)
        )
    );

    let {tags} = await askTags()
    tags = tags.split(',').map(t => t.trim())

    console.debug(
        chalk.green(
            "You've selected the tags: ", chalk.redBright(tags)
        )
    );

    const {description} = await askDescription()

    console.debug(
        chalk.green(
            "You've selected the description: ", chalk.redBright(description)
        )
    );

    const {excerpt} = await askExcerpt()

    console.debug(
        chalk.green(
            "You've selected the excerpt: ", chalk.redBright(excerpt)
        )
    );

    const {featured} = await askIfFeatured()
    console.debug(
        chalk.green(
            "The post", chalk.cyan(featured ? "is featured" : "is not featured")
        )
    );

    const {author} = await askAuthor()

    console.log(
        chalk.bold(
            "👩🏻‍💻", "The author is ", chalk.cyan(author)
        )
    )

    const {coverImage} = await askForCoverImage(id)

    if (coverImage)
        console.log(
            chalk.bold(
                "🖼", "The image is ", chalk.cyan(path.join('/assets/img', id, coverImage))
            )
        );
    else
        console.log(
            chalk.bold(
                "🖼", "The image is ", chalk.cyan("not selected")
            )
        )

    const {content} = await askForContent()

    console.log(
        chalk.bold(
            "📜", "The content is\n", chalk.cyan(content)
        )
    )

    // touch the file
    fs.closeSync(fs.openSync(filepath, 'w'));

    const meta = `---
extends: _layouts.post
section: content
author: ${author}
title: ${name}
slug: ${slugged}
id: ${id}
date: ${date.toISOString()}
tags: [${tags.join(',')}]
categories: [${categories.join(',')}]
excerpt: ${excerpt}
description: ${description}
featured: ${featured}
language: ${language}
${coverImage ? `cover_image: ${path.join('/assets/img', id, coverImage)}` : ''}
---\n`

    await fs.promises.appendFile(filepath, meta)
    console.debug('created metadata')
    await fs.promises.mkdir(imgPath, {recursive: true})
    await fs.promises.mkdir(attachmentsPath, {recursive: true})
    await fs.promises.appendFile(filepath, content)
    console.log(
        chalk.greenBright("Enjoy your post!", filepath)
    )
    console.log(
        chalk.greenBright("img path:", imgPath)
    )
    console.log(
        chalk.greenBright("attachment path:", attachmentsPath)
    )


}

execute()