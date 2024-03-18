//import OpenAI from "openai"; 

const OpenAI = require('openai');

const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const app = express();
const port = 3000;

const openai = new OpenAI({
  organization: 'org-6IXpvf4Xo5eOG4ehfxj6DB31',
  apiKey: "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",
});

app.use(bodyParser.json());
app.use(cors());

app.post('/', async (req, res) => {
  const { message } = req.body;

  let myPrompt = `Pretend you are an enviromental sustainability chatbot for a college campus, called GreenBot respond to the following: `

  const response = await openai.chat.completions.create({
    model: "gpt-3.5-turbo",
    messages: [{ role: "user", content: myPrompt + ` ${message}` }],
    stream: true,
  });

  let chunkText = "";

  for await (const chunk of response) {
    chunkText += chunk.choices[0]?.delta?.content || "";
  }

  res.json({
    message: chunkText,
  });
});

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`);
});
