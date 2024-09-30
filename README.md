## Requisitos

* PHP 8.2 ou superior
* Composer
* Node.js 20 ou superior
* GIT

## Como executar o projeto a partir do Laravel Sail

## CLONANDO PROJETOS

* Clone, mantendo nome original do projeto:
```
git clone caminho_projeto
```
ou

* Clone, alterando o nome do projeto:
```
git clone --recurse-submodules caminho_projeto novo_nome_projeto
```
## ALTERAR O PROPIETÁRIO DO DIRETÓRIO DO PROJETO PARA O USUÁRIO HOST
```
sudo chown -R $USER:$USER /caminho_do_projeto
```

## AJUSTE DAS PERMISSÕES DO DIRETÓRIO
```
sudo chmod -R 755 /caminho_do_projeto
```

## ACESSO O DIRETÓRIO DO PROJETO
```
cd /caminho_do_projeto
```

## CRIE O ARQUIVO .env
```
cp .env.example .env
```

## AJUSTE AS VARIÁVEIS DE AMBIENTE
```
nano .env
```

## USAR O DOCKER PARA CRIAR OS CONTAINERS
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

## START NO SAIL
```
./vendor/bin/sail up -d
```

## REALISAR O UPDATE DOS COMPONENTES
```
./vendor/bin/sail composer update
```

## REALIZAR INSTALAÇÃO DAS DEPENDÊNCIAS JS
```
./vendor/bin/sail npm install
```

## GERAR O KEY DA APLICAÇÃO
```
./vendor/bin/sail artisan key:generate
```

## RODAR AS MIGRATIONS
```
./vendor/bin/sail artisan migrate
```

## RODAR AS SEEDERS
```
./vendor/bin/sail artisan db:seed
```

## INICIAR O VITE
```
./vendor/bin/sail npm run dev
```
