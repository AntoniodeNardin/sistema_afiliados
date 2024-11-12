# Sistema de Afiliados para Construção Civil

Este projeto é um sistema de gestão de vendas e comissões de afiliados voltado para o ramo da construção civil. Ele oferece funcionalidades como cadastro de afiliados, produtos, geração de cupons de desconto, cálculo de comissões, e registro de vendas.

## Funcionalidades

- **Gestão de Afiliados**: Cadastro, edição e exclusão de afiliados.
- **Gestão de Produtos**: Cadastro de produtos do ramo da construção civil.
- **Registro de Vendas**: Venda de produtos com cálculo automático de valores, descontos e comissões.
- **Geração de Cupons**: Cupons intuitivos para desconto de clientes.
- **Relatórios**: Sumário de vendas, comissões e descontos aplicados.

## Tecnologias Utilizadas

- **Laravel**: Framework PHP para desenvolvimento web.
- **Breeze**: Sistema de autenticação para gerenciar logins e registros de usuários.
- **SQLite**: Banco de dados utilizado para armazenamento de dados.

## Requisitos

- PHP >= 8.x
- Composer
- Laravel 10.x
- Node.js (opcional, para compilar recursos frontend com `npm`)

## Instalação

1. Clone este repositório:
   ```bash
   git clone https://github.com/seu-usuario/nome-do-projeto.git


Estrutura de Pastas
    app/Models: Modelos Eloquent.
    app/Http/Controllers: Controladores do sistema.
    database/migrations: Migrações do banco de dados.
    resources/views: Views do frontend (Blade).
    routes/web.php: Rotas da aplicação.
