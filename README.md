# Como ejecutar

Para ejecutar este proyecto, clonarlo, levantar docker localmente y utilizar el comando ***docker-compose up --build*** en la carpeta raiz del mismo. La api estará disponible en el puerto 8000

Se puede importar a postman la siguiente [Collection](https://github.com/leodrk/maslow-challenge/blob/master/postman/Maslow_Challenge.json) para probar los endpoints de la api

## Usuarios de prueba por cada rol:

```json
Maslow_Admin
{
  "email":"maslow_admin@test.com",
  "password":"rootroot"
}

Company_Admin
{
  "email":"company_admin@test.com",
  "password":"rootroot"
}

Company_Employee
{
  "email":"company_employee1@test.com",
  "password":"rootroot"
}
```
### Link al Challenge: [Challenge Maslow](https://github.com/leodrk/maslow-challenge/blob/master/Challenge%20Backend%20Maslow%202024.pdf)
