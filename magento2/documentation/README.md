# Pet Shop 
## Grigoras Simona
## Cloud Computing (Faculty of Computer Science Iasi)
 

 ## Implementation
The application is based on php framework Magento ver. 2.2.6

 ## User interaction flow Diagram

![Diag](https://raw.githubusercontent.com/simonaionelagrigoras/sofy/master/documentation/flow_diagram.png)

 ## Bussiness Canvas Plan
 ![Bussiness Canvas Plan](Petshop_Business_Model_Canvas.png)


 ## Flow description
 The user can access the application without an account. In order to place an order, the user has to create an account.
 After adding products to cart, the user can bisualize his products through minicart or by going on cart page.
 The cart page is the first step of the checkout process. In the next step, a shipping address should be added or selected if it already exists
 in order to calculate the shipping amount. Lats step: choose payment method and place order.
 After placing the order, the customer is redirected to order success page where is displayed the link to the created order in his account
 
 All these actions are structured under the architectural pattern  MVC (Model - View - Controller)

 ## MVC Pattern
 Model–View–Controller (usually known as MVC) is an architectural pattern commonly used for developing user interfaces that divides an application into three interconnected parts. This is done to separate internal representations of information from the ways information is presented to and accepted from the user.[1][2] 
 The MVC design pattern decouples these major components allowing for code reuse and parallel development.
 (source [Wikipedia](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller))

![MVC](mvc.jpg)



 ## How it's done
### Agile Methodology
The Agile Method is a particular approach to project management that is utilized in software development. This method assists teams in responding to the unpredictability of constructing software. It uses incremental, iterative work sequences that are commonly known as sprints.

The general principles of the Agile Method

1.  Satisfy the client and continually develop software.
2.  Changing requirements are embraced for the client’s competitive advantage.
3.  Concentrate on delivering working software frequently. Delivery preference will be placed on the shortest possible time span.
4.  Developers and business people must work together throughout the entire project.
5.  Projects must be based on people who are motivated. Give them the proper environment and the support that they need. They should be trusted to get their jobs done.
6.  Face-to-face communication is the best way to transfer information to and from a team.
7.  Working software is the primary measurement of progress.
8.  Agile processes will promote development that is sustainable. Sponsors, developers, and users should be able to maintain an indefinite, constant pace.
9.  Constant attention to technical excellence and good design will enhance agility.
10. Simplicity is considered to be the art of maximizing the work that is not done, and it is essential.
11. Self-organized teams usually create the best designs.
12. At regular intervals, the team will reflect on how to become more effective, and they will tune and adjust their behavior accordingly.
![Agile](agile.png)
 

 ### Scrum Methodology
Scrum is an agile project management methodology or framework used primarily for software development projects with the goal of delivering new software capability every 2-4 weeks. It is one of the approaches that influenced the Agile Manifesto, which articulates a set of values and principles to guide decisions on how to develop higher-quality software faster.
 -  “Scrum Master” – the person who maintains the process
 -  “The Client” 
 -  “The Development Team” – a group of  7-8 persons who analyze, project and implement

In timpul fiecarui “sprint” (de obicei cu o durata de 2-4 sapatamani), echipa creaza un increment ce poate fi livrat. Setul de caracteristici ce intra intr-un “sprint” provin din “backlog”-ul proiectului, care reprezinta un set prioritizat de cerinte de nivel inalt ce trebuiesc realizate.  In timpul unei sedinte de planificare a sprint-ului, se stabilesc cerintele ce vor intra in sprint. Cerintele sunt “inghetate” in timpul unui sprint. Sprint-ul trebuie sa se incheie la timp. Daca cerintele nu sunt implementate complet, ele se intorc in backlog-ul proiectului. Dupa terminarea unui sprint, echipa trebuie sa demonstreze functionarea software-ului.

Organizations that have adopted agile Scrum have experienced:

 - Higher productivity
 - Better-quality products
 - Reduced time to market
 - Improved stakeholder satisfaction
 - Better team dynamics
 - Happier employees
 
![SCRUM](scrum.jpg)


