# Tema Layer Up

## Descrição

O tema WordPress Layer Up é um tema simples e responsivo, desenvolvido para atender as necessidades de uma usuário que precisa integrar seus posts via ajax.

## Recursos

- Layout responsivo que se adapta a dispositivos móveis, tablets e desktops.
- Integração via ajax, permitindo que posts sejam filtrados sem recarregar a página.
- Arquiquetura do sistema profundamente pensada, que permitirá a fácil expansão e interoperabilidade do sistema com um menor custo.

## Requisitos

1. Composer, o gerenciador de dependencias do php.
2. Npm, o gerenciador de dependencias do javascript.
3. PHP 7.4+ instalado e rodando na máquina.
4. Um servidor que cnsiga executar php (apache,nginx, etc...).

## Instalação

1. Faça o download do tema Layer up dentro de sua pasta de temas de sua instalação do wordpress, usando o comando:
`git clone https://github.com/Bisnaga-create/layerup_theme.git`
2. Após criado e instalado o tema, acesse a pasta raiz do tema com o comando `cd ./layerup_theme`.
3. Execute os comandos `composer install` e `npm install`, respectivamente.
4. Após instaladas as dependências necessárias, executar o comando `composer build:assets`.
5. Ativar o tema e se divertir!

## Estrutura de Pastas

```
└── src
    ├── Api
    ├── assets
    │   ├── css
    │   └── js
    │       └── dev
    │           ├── api
    │           └── Content
    ├── Controllers
    ├── Models
    ├── Setup
    └── templates
        ├── common
        ├── feeds
        ├── grids
        └── sections
```

### Descrição da Estrutura de Pastas

- `src/`: Esta pasta contém todos os arquivos raízes do projeto, responsáveis pelo seu funcionamento.
  - `assets/`: Aqui estão os assets do tema, tanto as versões compiladas como as em dev.
    - `css/`: Carrega o css costumizado do tema.
    - `js/`: Carrega o js costumizado do tema.
        - `dev/`: Aqui ficam os arquivos javascript não compilados, passíveis de edição.
            - `api/`: Pasta responsável por guardar os arquivos responsáveis pela comunição com os endpoints.
            - `content/`: Pasta responsável por guardar os arquivos responsáveis pela manipulação do conteúdo das páginas.
- `Controllers/`: Nesta pasta ficam os controladores do projeto, responsáveis por recuperar os dados dos Models e envia-los ao template correto.
- `Models/`: Nesta pasta ficam os Models do projeto, responsáveis por armazenar os dados das entidas participantes.
- `Setup/`: Esta pasta contém arquivos de configuração e inicialização do tema.
- `templates/`: Esta pasta contém os templates, onde os dados são renderizados para o usuário final.
    - `common/`: Guarda os templates que aparecem em várias páginas do tema.
    - `grids/`: Guardam os grids que recebem dados em lote e mandam de forma unitizada para os feeds.
    - `feeds/`: Recebem os dados de forma unitizada e os rnderizam no local correto.
    - `sections/`: Guarda algumas sections específicas do sistema, que se aproveitam de outros templates já existentes.

## Suporte

Se você tiver alguma dúvida, problema ou sugestão relacionada ao tema, sinta-se à vontade para entrar em contato conosco através de meu email(guinovembro43@gmail.com).

## Documentação da api

Para visualizar a api com as rotas costumizadas deste projeto, você pode acessar a documentação de rotas:

## Licença

O tema é licenciado sob a Licença MIT. Consulte o arquivo `LICENSE` para obter mais informações.

## Agradecimentos

Gostaría de agradecer a LayerUp pela oportunidade de concorrer a vaga de Desenvolvedor Full Stack.

---
