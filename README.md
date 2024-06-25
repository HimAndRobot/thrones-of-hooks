# Thrones of Hooks

Este projeto é um sistema desenvolvido para facilitar o teste de APIs e retornos de webhooks. Construído com Laravel, Livewire e Reverb, ele oferece uma interface interativa e notificações em tempo real para monitorar e gerenciar solicitações de webhooks.

## Funcionalidades

- **Recebimento de Webhooks**: Permite receber solicitações de webhooks de diferentes fontes.
- **Visualização em Tempo Real**: Utilizando Livewire, oferece uma interface dinâmica que exibe as solicitações recebidas sem a necessidade de recarregar a página.
- **Notificações Instantâneas**: Com Reverb, o sistema envia notificações em tempo real sobre novas entradas de webhooks, facilitando o monitoramento e a resposta rápida.
- **Logs Detalhados**: Armazena detalhes das solicitações recebidas para análise posterior.

## Tecnologias Utilizadas

- [Laravel](https://laravel.com/): Framework PHP para construção de aplicações web robustas.
- [Livewire](https://laravel-livewire.com/): Framework full-stack para Laravel que facilita a construção de interfaces dinâmicas.
- [Reverb](https://reverb.laravel.com/): Biblioteca para notificações em tempo real com suporte a WebSockets.

## Pré-requisitos

- PHP >= 8.2
- Composer
- Node.js & NPM

## Instalação

1. Clone o repositório:
    ```sh
    git clone https://github.com/HimAndRobot/thornes-of-hooks.git
    cd thrones-of-hooks
    ```

2. Instale as dependências do PHP e do Node.js:
    ```sh
    composer install
    npm install
    npm run dev
    ```

3. Configure o arquivo `.env`:
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

4. Configure a conexão com o Redis no arquivo `.env`:
    ```dotenv
    REVERB_APP_ID=YOUR_APP_ID
    REVERB_APP_KEY=YOUR_APP_KEY
    REVERB_APP_SECRET=YOUR_APP_SECRET
    REVERB_HOST="localhost"
    REVERB_PORT=8080
    REVERB_SCHEME=http
    ```

5. Execute as migrações e seeders:
    ```sh
    php artisan migrate --seed
    ```

6. Inicie o servidor:
    ```sh
    php artisan serve
    ```

7. Inicie o servidor de WebSockets:
    ```sh
    php artisan reverb:start --debug
    ```

## Uso

- Acesse a aplicação em `http://localhost:8000`
- Utilize a interface para configurar e monitorar os webhooks recebidos
- Visualize as entradas de webhooks em tempo real e acesse os detalhes completos de cada solicitação

## Estrutura do Projeto

- `app/Http/Livewire`: Componentes Livewire para interatividade
- `routes/web.php`: Rotas principais da aplicação

## Contribuição

1. Fork o repositório
2. Crie sua branch de feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## Licença

Distribuído sob a licença MIT. Veja `LICENSE` para mais informações.

## Contato

Gean Pedro da Silva - geanpn@gmail.com

Test Live: [https://geanpedro.com.br/thrones-of-hooks](https://geanpedro.com.br/thrones-of-hooks)

Link do Projeto: [https://github.com/HimAndRobot/thornes-of-hooks](https://github.com/HimAndRobot/thornes-of-hooks)
