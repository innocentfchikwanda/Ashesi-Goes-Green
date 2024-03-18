const OpenAI = require("openai");
const openai = new OpenAI({ apiKey: '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' });

async function main() {
  const completion = await openai.chat.completions.create({
    messages: [{ role: "system", content: "You are a helpful assistant." }],
    model: "gpt-3.5-turbo",
  });

  console.log(completion.choices[0]);
}

main();