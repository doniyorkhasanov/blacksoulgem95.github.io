window.setRandomQuote = () => {
    const random_quotes = [
        // futurama openings
        "Not a substitute for human interaction",
        "Featuring a new invisible character who doesn't speak",
        "Tell your parents it's educational",
        "Coming soon to an illegal DVD",
        "Made from 100% recycled pixels",
        "Penetrates even the thickest foil hat",
        "0100100001101001",
        "Proudly made on Earth",
        "For proper viewing, take red pill now",

        // futurama quotes
        "You watched it! You can't unwatch it!",

        // Simpson's quotes
        "Aw, 20 dollars? I wanted a peanut!",
        "I know all those words, but that sentence makes no sense to me",
        "I can't believe it! Reading and writing actually paid off!",
        "D'OH!",
        "Stop thinking about fun and have it",
        "Batman's a scientist",
        "I'd be vegetarian if bacon grew on trees",

        // Matt Groening
        "Families are about love overcoming emotional torture",
    ]

    const id = window.randomInt(0, random_quotes.length - 1)
    document.querySelector("#random_quote").innerText = random_quotes[id]
}