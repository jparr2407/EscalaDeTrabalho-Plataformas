# Escala de Trabalho - Equipe de Plataformas
Fui designado na equipe à criar um sistema de escala de trabalho para diversos times da nossa gerência, onde esses times precisavam registrar não somente os dias de escala, mas também os horários de entrada e saída de cada colaborador no dia específico. Esse aplicação foi desenvolvia usando PHP, HTML, CSS e JavaScript.
Não sou tão familiarizado com PHP, então o código pode não estar 100% adequado às melhores práticas.

Abaixo irei deixar algumas imagens de como a apicação funciona.

## 1. Esse é o index, ou seja, essa é a página principal responsável por te direcionar para as outras.
![image](https://github.com/jparr2407/EscalaDeTrabalho-Plataformas/assets/144358738/e8bfe586-1344-4c6d-bd1d-0fa41cae9bfb)

## 2. Clicando em uma das equipes, você irá se deparar com um calendário e uma tabela no fim da página.
![image](https://github.com/jparr2407/EscalaDeTrabalho-Plataformas/assets/144358738/c7922fd9-90c7-469e-a48f-c1863ff8a239)
![image](https://github.com/jparr2407/EscalaDeTrabalho-Plataformas/assets/144358738/6ea582fa-ad0f-4f3c-a1ec-8d461e8435d9)

Obs.: A tabela mostra registros passados, escalas que já foram atendidas. A tabela abaixo do calendário só mostra escalas a partir do dia atual, ou seja, não mostrará dados do passado. Resolvi deixar dessa maneira para não poluir muito a tabela com dados que são desnecessários no momento.

## 3. Ao clicar na aba de admin, será redirecionado para uma tela de login.
![image](https://github.com/jparr2407/EscalaDeTrabalho-Plataformas/assets/144358738/9cba2a08-c9a8-4ab2-82c3-1482193b76ba)

## 4. Ao realizar o login, você irá se deparar com uma página onde será capaz de realizar alterações de qualquer tipo.
![image](https://github.com/jparr2407/EscalaDeTrabalho-Plataformas/assets/144358738/8d46fbc1-9e7d-4e4b-a38d-e8e30f6fd9dc)

Obs.: No cabeçalho, temos como ver a escala geral, que é onde veremos todas as escalas de todos os times. Também podemos selecionar por times específicos no cabeçalho.
Nessa foto, a linha está em vermelho pois o colaborador está ativo na escala no momento em que foi tirado o print, dia 29/05/2024 entre 1h e 23h, ou seja, estará de escala o dia inteiro. Mas quando o colaborador não está ativo na escala, ela não ficará marcada em vermelho, ficará normal.

## 5. Seguindo o passo anterior, temos as opções de deletar ou editar um colaborador.
![image](https://github.com/jparr2407/EscalaDeTrabalho-Plataformas/assets/144358738/b958a6fd-a033-463a-b54d-70b49167f01c)

Obs.: Ao clicar em editar, será redirecionado à uma página onde você poderá editar todas as informações daquele colaborador (exceto o id, para não bagunçar o banco de dados).
Ao salvar as edições, já será refletido na aplicação.

## 6. Temos também na aba INSERIR no cabeçalho.
![image](https://github.com/jparr2407/EscalaDeTrabalho-Plataformas/assets/144358738/5d26d341-77d0-47cf-8b89-59e11662c0ef)

Obs.: Aqui é feita a inserção individual para cada colaborador.

## 7. Partimos agora para a aba IMPORTAR do cabeçalho.
![image](https://github.com/jparr2407/EscalaDeTrabalho-Plataformas/assets/144358738/bbb58c28-65e5-41bd-ad2c-3a64cb3381b2)

Obs.: Aqui nós podemos realizar uma inserção em massa de colaboradores e suas devidas escalas. Temos algumas regras que devemos seguir para realizar a inserção, umas dela é que o arquivo precisa ser um .csv, não pode ser .xlsx ou alguma variante do excel.
Deixarei um template de um .csv para ser usado de exemplo na inserção.

## 8. INFORMAÇÕES IMPORTANTES

No código temos um arquivo chamado Portal.sql, esse arquivo nao tem função dentro do código, mas você deve abrir e usá-lo para criar as tabelas em seu banco de dados mysql. Lá nós temos informações das propriedades de cada tabela e das triggers necessárias, pois temos um log onde registra as últimas alterações nas escalas, como inserção|deleção|edição. Fizemos isso para saber o que foi alterado, pois tinham vários admin alterando os dados diariamente.
