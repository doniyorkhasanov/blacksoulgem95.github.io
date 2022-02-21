import * as path from "path";
import * as fs from "fs";
import parseMD from 'parse-md'

import {fileURLToPath} from 'url';

const __filename = fileURLToPath(import.meta.url);

const __dirname = path.dirname(__filename);


export async function getCategories() {
    const catPath = path.join(__dirname, '..', 'source', '_categories')
    const files = await fs.promises.readdir(catPath)
    console.log('files', files)
    return await Promise.all(files.map(async f => {
        // @ts-ignore
        const {metadata} = parseMD(await fs.promises.readFile(path.join(catPath, f), {encoding: 'utf-8'}));
        return {
            id: path.parse(f).name,
            name: metadata.title
        }
    }))
}