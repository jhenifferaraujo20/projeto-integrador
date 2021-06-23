# projeto-integrador
Site e-commerce desenvolvido durante o curso técnico em informática

```sql
CREATE TABLE `loja_jadore`.`clientes` ( 
    `id` INT NOT NULL AUTO_INCREMENT ,  
    `nome` VARCHAR(60) NOT NULL ,  
    `cpf` VARCHAR(11) NOT NULL ,  
    `telefone` VARCHAR(20) NOT NULL ,  
    `cep` VARCHAR(9) NOT NULL ,  
    `endereco` VARCHAR(80) NOT NULL ,  
    `cidade` VARCHAR(50) NOT NULL ,  
    `estado` VARCHAR(30) NOT NULL ,  
    `email` VARCHAR(60) NOT NULL ,  
    `senha` VARCHAR(32) NOT NULL ,    
    PRIMARY KEY  (`id`)
) 
ENGINE = InnoDB;
```

```sql
CREATE TABLE `loja_jadore`.`categorias` ( 
    `id` INT NOT NULL AUTO_INCREMENT ,  `categoria` VARCHAR(30) NOT NULL ,    PRIMARY KEY  (`id`)
) 
ENGINE = InnoDB;
```

```sql
CREATE TABLE `loja_jadore`.`produtos` ( 
    `id` INT NOT NULL AUTO_INCREMENT ,  
    `nome` VARCHAR(100) NOT NULL ,  
    `preco` FLOAT NOT NULL ,  
    `descricao` TEXT NOT NULL ,  
    `cor` VARCHAR(20) NOT NULL ,  
    `tamanho` VARCHAR(5) NOT NULL ,  `id_categoria` INT NOT NULL ,  `quantidade_estoque` INT NOT NULL ,  
    `foto` VARCHAR(100) NOT NULL ,    
    PRIMARY KEY  (`id`)
) 
ENGINE = InnoDB;
``` 

```sql
ALTER TABLE `produtos` ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias`(`id`);
```

```sql
ALTER TABLE `pedidos` ADD CONSTRAINT `fk_pedidos` FOREIGN KEY (`id_cliente`) REFERENCES `clientes`(`id`);
```

```sql
ALTER TABLE `itens_pedido` ADD CONSTRAINT `fk_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos`(`id`);
```

```sql
ALTER TABLE `itens_pedido` ADD CONSTRAINT `fk_produtos` FOREIGN KEY (`id_produto`) REFERENCES `produtos`(`id`);
```

```sql
ALTER TABLE `clientes` ADD `data_cadastro` DATE NOT NULL AFTER `senha`;
```
