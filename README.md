# 💱 Conversor de Moedas em PHP com AwesomeAPI

Este projeto é um conversor de moedas simples, desenvolvido em **PHP puro**, que utiliza a **AwesomeAPI** para obter cotações em tempo real de mais de 150 moedas diferentes.

---

## 🚀 Funcionalidades

- Conversão entre moedas com base em cotações reais.
- Suporte a moedas como **Real (BRL)**, **Dólar (USD)**, **Euro (EUR)**, **Bitcoin (BTC)** e **Peso Chileno (CLP)**.
- Atualização automática dos valores de cotação via requisição HTTP.
- Tratamento de exceções e lógica especial para pares não suportados diretamente pela API (ex: BRL → BTC).
- Mantém os valores preenchidos no formulário após a conversão.

---

## 🛠 Tecnologias utilizadas

- **PHP 8+**
- **HTML5**
- **CSS3**
- [AwesomeAPI](https://docs.awesomeapi.com.br/api-de-moedas) (serviço gratuito de cotações de moedas)

---

## 🔧 Como utilizar

1. Clone ou baixe este repositório.
2. Inicie um servidor local (como XAMPP, WAMP, Laragon ou outro).
3. Coloque os arquivos na pasta pública do servidor (ex: `htdocs` no XAMPP).
4. Acesse o projeto via navegador (ex: `http://localhost/Conversor`).
5. Insira um valor, selecione as moedas de origem e destino, e clique em **Converter**.

---

## ⚙️ Lógica de funcionamento

- O formulário envia os dados via método `POST`.
- O backend monta a URL da API usando o par de moedas selecionado (ex: `USD-BRL`).
- A função `obterCotacao()` faz a requisição para a AwesomeAPI usando `file_get_contents()`.
- Se a cotação não for encontrada (por exemplo, BRL-BTC), a função tenta inverter o par e calcula a cotação como `1 / valor`.
- O valor convertido é então exibido abaixo do formulário, formatado corretamente.

---

## 🐞 Tratamento de erros

- Verificação se a requisição à API falhou.
- Correção de pares de moedas invertidos.
- Exibição de mensagens de erro amigáveis ao usuário.
- Verificação se as moedas de origem e destino são iguais.

---

## 📌 Observações

- A AwesomeAPI pode não ter suporte direto para todos os pares de moedas, especialmente envolvendo Bitcoin. Esse caso foi tratado manualmente.
- Certifique-se de estar conectado à internet para que a API funcione corretamente.
- Este projeto não usa nenhum framework — é 100% PHP puro.

---

## 📷 Preview

![tela conversor2](https://github.com/user-attachments/assets/e1136fb2-9b0f-4373-ae1a-62a5812fca7e)

---

## ✍️ Autor

Desenvolvido por **Humberto Gabriel**.
