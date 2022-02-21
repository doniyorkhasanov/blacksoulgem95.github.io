window.setRandomQuote = () => {
    const random_quotes = [
        "Not a substitute for human interaction",
        "Featuring a new invisible character who doesn't speak",
        "Tell your parents it's educational",
        "Coming soon to an illegal DVD",
        "Made from 100% recycled pixels",
        "Penetrates even the thickest foil hat",
        "0100100001101001",
        "Proudly made on Earth",
        "For proper viewing, take red pill now"
    ]

    const id = window.randomInt(0, random_quotes.length - 1)
    document.querySelector("#random_quote").innerText = random_quotes[id]
}