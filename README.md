# interoperabilidade_PHP_PY

### Implementando interoperabilidade de sistemas com PHP e Python

Neste projeto são replicados 3 sistemas de operadoras de transporte aéreo (LATAM, Azul e Go) em PHP. Em cada sistema foi publicado um serviço para verificar a disponibilidade de voos de alguma origem para algum destino em um intervalo de datas e outro serviço para permitir a compra de passagens, verificando se o cliente já está cadastrado e em caso negativo, realizando o cadastro. Um 4º sistema deve ser desenvolvido (DecoLaura) em Python para centralizar as buscas das outras 3 operadoras de transporte aéreo. Este sistema deve fazer busca por passagens pelos critérios de origem, destino e intevalo de tempo nas 3 operadoras e mostrar os resultados ordenados por preço. Deve ainda permitir a compra de passagem pelo cliente, consumindo os serviços publicados

## Rodar o servidor do projeto PHP
```
$ php -S localhost:$porta
```

## Rodar o servidor do projeto Python
```
$ Python arquivo.py
```
