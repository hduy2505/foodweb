# PE2022_Team 4 

## Members

Pham Le Hoang Duy (17590) (Team Leader) <br/>
Hoang An (15693) <br/>
Vo Dang Khoa (18955) <br/>
Nguyen Phan Truc Ly (16580) <br/>
Truong Nguyen Thien An (15890) <br/>
## Project Description

We are FF15 (Fast Food Order 15), a software that focuses on developing applications for users, typically for user searching for the ease of order food while staying at distance places, to avoid the needed of waiting at a restaurant. 

Background: FF15 resembles other assessment websites such as shopeefood.com, mcdonald.com, etc.
However, we improve the styles and usability of the food order so that they are personalized and customized for admins and users.


This application has 2 interfaces:

- User Interface
- Admin Interface

Users after registration can:

- View the food and drink that is appear on our application.
- Order the food and drink.
- View the meal which is the combination of the food and drink that they have choose.
- Check the meal they have ordered and confirmed the meal.

Admin of this application can:

- View all User's Order.
- View all User's Order Details and 

## Usecase

For this application, Peekaboo applies Scrum to boost the development productivity.

### Product Backlog

Product Backlog is the Master Board for teams **(Frontend, Backend)** to find the users’ demands. Each story will be picked for Sprint circle in order based on its priority and score. There are 2 types of user:

| Users | Note |
| --- | --- |
| Admin | [A] |
| Customer | [S] |

| User Stories | Score | Priority (Top: 5 → Bottom: 1) |
| --- | --- | --- |
| [C] I want register and make an order.  | 2 | 5 |
| [A] I want to manage all the data of the items on the menu. | 2 | 5 |
| [A] I want to manage all the customer’s data. | 1.5 | 5 |
| [A] I want to be able to assign category to an item. | 1.5 | 5 |
| [A] I want to change the payment status of the customer’s order. | 1.5 | 4 |
| [C] I want to view what I have added in my cart. | 1.5 | 4 |
| [C] I want to check out the order that I have made | 1.5 | 4 |
| [C] I want to view my orders history and its information. | 1 | 3 |
| [A] I want to view user orders so that I can send it to the chef| 1 | 3 |
| [C] I want to view the latest items on the menu| 1 | 2 |


---

### Usecase Diagram

![image](Admin_Use-case.png)

![image](User_usecase.png)

---

### Class Diagram

![image](2.Login-Class%20diagram.drawio.png)

![image](Database.png)

---

### ER Diagram

![image](ER.png)

<h1 style align="center">User Sequence Diagram</h1>

This is the diagram that shows how user use website

### 1. Registration function

**Basic flow:**
This describes the steps:

1. The user attempts to login
2. The user fills in the registration form
3. The user submits the registration form
4. The system checks the information
5. The system sends authentication code to the user
6. The user fills in the code
7. The account has been created

![image](Register.png)
<p style align="center"> Registration diagram </p>

### 2. Log in function

**Basic flow:**
This describes the steps:

1. The user enters username and password
2. The system check for existing username/password in the database
3. The system accepts username and password
4. The user successfully logged into the website
5. The system adds user session
6. The system checks previous session, then delete it

![image](Login.png)
<p style align="center"> Login diagram </p>

### 3. Log out function

**Basic flow:**
This describes the steps:

1. The user chooses to log out
2. The system asks for sign-out confirmation
3. The system deletes the user session

![image](Logout.png)
<p style align="center"> Logout diagram </p>

### 4. Edit profile function

**Basic flow:**
This describes the steps:

1. The user selects Edit profile function in the settings
2. The system changes to the Edit profile function
3. The user adjusts the information
4. The system sends authentication code to the user
5. The user enters the code
6. The system verifies the code
7. The information has successfully been updated

![image](Edit-Profile.png)
<p style align="center"> Edit Profile diagram </p>

### 5. Choose the meal function

**Basic flow:**
This describes the steps:

1. The user chooses the food and drink
2. The system notifies user can choose food's and drink's types
3. The system notifies the choosen food and drink

![image](Choose_the_meal.png)
<p style align="center"> Choose the food and drink diagram</p>


This is the diagram that shows how admin use and control the website

### 1. Log in function

**Basic flow:**
This describes the steps:

1. The administrator enters username and password
2. The system checks for existing username/password in the database
3. The system accepts username and password
4. The administrator successfully logged into the website
5. The system adds administration session

![image](Admin/Activities/1.Management-Login.png)
<p style align="center"> Admin Login diagram </p>

### 2. Log out function

**Basic flow:**
This describes the steps:

1. The administrator chooses to log out
2. The system asks for sign-out confirmation
3. The system deletes the user session

![image](Admin/Activities/2.Management-Logout.png)
<p style align="center"> Logout diagram </p>

### 3. Management function

**Basic flow:**
This describes the steps:

1. Administrator locates the user's account or the meal information in the database
2. The administrator selects the functions to perform on the discovered account or discovered meal
3. The system receives the query and transmits it to the database
4. The query is executed by the database
5. The database informs the system of the outcome
6. The system shows the results to the administrator

![image](Admin/Activities/3.Management-Review-Management.png)
<p style align="center"> Management function diagram </p>

### 4. Review the order function

**Basic flow:**
This describes the steps:

1. The administrator views the order data
2. The administrator chooses to view users' order or meals' details
3. The system gets the information from the database to show the user's order
4. The administrator chooses to view the other order
5. The system gets the information from the database to show user's order.
6. The administrator can choose to Deny or Accept user's order

![image](Admin/Activities/4.Review%20Order.png)
<p style align="center"> View the order function diagram </p>


---

### 1.Log in layout:

**Basic flow:**
This describes the steps:

1. Two fill Username and Password
2. Forgot password function
3. Log in button
4. Link to Sign up

![image](Layout/Mobile_Sign_In.png)
<p style align="center"> Mobile Log in </p>

![image](Layout/Web_SIGN_IN.png)
<p style align="center"> Web Log in </p>

### 2.Sign up personal info layout:

**Basic flow:**
This describes the steps:

1. Four fill Fullname, Gender, DOB, Hear about us
2. Link to Log In
3. Continue button

![image](Layout/Mobile_Sign_Up.png)
<p style align="center"> Mobile Sign up personal info </p>

![image](Layout/Web_SIGN_UP.png)
<p style align="center"> Web Sign up personal info </p>

### 3.Sign up fail details layout:

**Basic flow:**
This describes the steps:

1. Four fill Email ID, Create Password, Phone number, Creadit card info
2. Link to Log In
3. Back button
4. Submit button

![image](Layout/Mobile_Sign_Up_Fail.png)
<p style align="center"> Mobile Sign up failed details </p>

![image](Layout/Web_SIGN_UP_FAIL.png)
<p style align="center"> Web Sign up failed details </p>

### 4.Home page layout:

**Basic flow:**
This describes the steps:

1. Start button to Login
2. Register button for registration

![image](Layout/Mobile_Landing_Page.png)
<p style align="center"> Mobile Home page </p>

![image](Layout/Web_Landing_Page.png)
<p style align="center"> Web Home page </p>

### 6.Choose food page layout: 
**Basic flow:**
This describes the steps:

1. Image and Title
2. Add to packet buttons

![image](Layout/Mobile_Choose_Food.png)
<p style align="center"> Mobile Food page </p>

![image](Layout/Web_FOOD.png)
<p style align="center"> Web Food page </p>

### 7.Choose drink page layout:

**Basic flow:**
This describes the steps:

1. Image and Title
2. Add to packet button

![image](Layout/Mobile_Choose_Drink.png)
<p style align="center"> Mobile Drink page </p>

![image](Layout/Web_DRINK.png)
<p style align="center"> Web Drink page </p>

### 8.Confirm Order:
**Basic flow:**
This describes the steps:

1. Confirming Order
2. Confirm Button for confirming

![image](Layout/Mobile_Order_Details.png)
<p style align="center"> Mobile Confirm Order Page </p>

![image](Layout/Web_CONFIRM.png)
<p style align="center"> Web Confirm Order Page </p>

### 9.Order Succesful page layout:

**Basic flow:**
This describes the steps:

1. User had finished choosing their food and drink
2. Return Order's ID
3. Review Order button to check order again

![image](Layout/Mobile_Order_Succesful.png)
<p style align="center"> Mobile Order Successful Page </p>

![image](Layout/Web_SUCCESSFUL.png)
<p style align="center"> Web Order Successful Page </p>

### 10.Review Order Details:
**Basic flow:**
This describes the steps:
1. Show a specific order's ID details

![image](Layout/Mobile_Review.png)
<p style align="center"> Mobile Review Order Page </p>

![image](Layout/Web_REVIEW.png)
<p style align="center"> Web Review Order Page </p>

### 11.Check user's Order admin page layout:
**Basic flow:**
This describes the steps:
1. Order card
2. Details button

![image](Admin/Export/Interface/Admin_Check_Order.png)
<p style align="center">Check Order Admin Page </p>

### 12.Check user's Order Details admin page layout: 
**Basic flow:**
This describes the steps:
1. Search bar
2. Remove button

![image](Admin/Export/Interface/Admin_Order_Details.png)
<p style align="center"> Check Order Details Admin Page </p>

