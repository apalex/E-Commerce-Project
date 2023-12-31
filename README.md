Alexandre Pham, Denis Roznerita, Brandon Pannunzio

**ABDGamestore.com User Guide**

**What is ABDGamestore?**

ABDGamestore.com is an E-Commerce platform with essential commerce
features that sells electronics and game-related products.It is built
with HTML, CSS, JavaScript, and PHP. It uses the Model-View-Controller
design pattern as its backbone.

**Installing Software**

To run ABDGamestore.com, you will first need to install a server to run
PHP.

-   Download XAMPP here:
    [[https://www.apachefriends.org/download.html]{.underline}](https://www.apachefriends.org/download.html)

-   Once downloaded, run the .exe file.

-   Leave everything on default, and press "Next".

-   Once downloaded and file is executed, you will be brought to the
    XAMPP Control Panel:

![](./media/image7.png){width="6.5in" height="4.152777777777778in"}

**Setting up the server**

To set-up the server for ABDGamestore.com, we will need to import the
files onto XAMPP, and turn on Apache and MySQL.

-   On the XAMPP Control Panel, on the right panel, there is "Explorer".
    Click it.

-   Next, you should be redirected to the xampp directory where you can
    find the document "htdocs". Double click it.

-   The file should be empty. You want to move the extracted source code
    of the website into that folder, it should look like this:

> ![](./media/image18.png){width="6.5in" height="1.1666666666666667in"}

-   Close that File Explorer tab of the XAMPP directory.

-   Next, you want to click on "Start" for both Apache and MySQL
    modules, it should turn green and look like this:

> ![](./media/image3.png){width="5.864583333333333in"
> height="2.4791666666666665in"}

-   Lastly, you want to type localhost/phpmyadmin/ onto your browser,
    you should be redirected to this page:

![](./media/image12.png){width="6.5in" height="3.138888888888889in"}

-   In the PHPMyAdmin Page, you want to find and click on the "import"
    button which is located in the Header of the page:

![](./media/image2.png){width="6.5in" height="2.2083333333333335in"}

-   Click on "Choose File", and find the directory of the "htdocs"
    located in the XAMPP, afterwards click inside of the
    E-Commerce-Project-main directory. You should find a file called
    "electronics_store", choose that file:

> ![](./media/image23.png){width="6.5in" height="4.819444444444445in"}

-   Afterwards, go back to the PHPMyAdmin import page, the file should
    have been chosen. Scroll all the way down until you find the
    "import" button, then import it.

Everything should be ready and set-up to navigate ABDGamestore.com!

**User Management/Rights**

There are 2 Permission-User types.

1.  Customer: it is the default permissions assigned to all accounts.

2.  Admin: an Admin user can only be assigned to an existing account, by
    another Admin.

**Login/Logout**

Customers can login on the login page if they have an account!

Here, they will be able to enter email and password information:

![](./media/image9.png){width="6.5in" height="3.138888888888889in"}

If they don't have an account, they can click on "Don't have an
account?" and will be redirected to the registration page. Additionally,
if they forgot their passwords, they can click on the "Forgot Password?"
link, where they will be redirected to the contact info of the page
where they can contact support to retrieve their passwords.

To logout, users have 2 options to choose from. They can either click on
the navigation bar hamburger icon, where there will be a logout button
choice, or they can go to their edit my account page, and click logout!

![](./media/image10.png){width="6.5in" height="3.125in"}

Or, after 24 hours have passed without the user interacting, they will
automatically be logged out.

**Features**

User Sessions:

A user will automatically be logged out of their account after 24 hours
of inactive use. Their carts will also be cleared after 3 days of
sitting.

Cart:

To access or add products to the cart, a user needs to be logged in.

Once they are logged in, they will be able to see the empty cart:

![](./media/image14.png){width="6.5in" height="3.25in"}

A customer will now be able to add products to their cart and it will
automatically add up all totals and update the cart.

Product searching:

On the header, there is a search bar where users can look for a type of
product or name, and it is matched to the items in the database.

![](./media/image6.png){width="6.5in" height="0.7083333333333334in"}

![](./media/image19.png){width="6.5in" height="5.236111111111111in"}

Product sorting:

When searching for a product, customers will be able to sort their
products according to the criteria they choose:

![](./media/image15.png){width="6.5in" height="2.7222222222222223in"}

Admin Panel:

Using the same login page as all other users, if you are an admin,
instead of being redirected to the index page once logged in, you are
redirected to the Admin Panel:

![](./media/image11.png){width="6.5in" height="3.263888888888889in"}

In the user section: you will be able to search for a User and edit
their information (except the User ID). You can also change their role
from "Customer" to "Admin".

In the product section, you can add or edit a product, and assign it a
discount.

In the store section: you can add a store or assign a new Product ID
according to the store.

Error Page:

If you enter a wrong link, you will automatically be redirected to the
error page:

![](./media/image8.png){width="6.5in" height="2.6666666666666665in"}

**Database Tables**

[User_Info]{.underline}:

The User_Info table contains information about a user. This includes the
user's unique id which is assigned automatically and increments with
every user, email, password, first name, last name,phone number, their
permissions,the date the account was created, and the last date it was
modified which changes every time a user changes their info.

[User_Address]{.underline}:

Since users have at least 1 but up to 3 addresses, user's addresses are
stored in the User_Address table. This table includes a unique id for
each address which increments which each address added, the user id the
address belongs to, the address (as in the building number and street
name), the city, zip code and country.

[User_Payment]{.underline}:

User's pay for their orders with a debit or credit card which is saved
and hashed in the user payment table. This table includes a unique
payment id, the type of payment which is either credit or debit, the
cardholder name, the card number, the cvv and the expiration date.

[Order_History]{.underline}:

Once an order is completed, it is stored in order history so users can
look at it later. This table includes an order_id which is unique, the
user_id to track which order belongs to who, the product id to know when
it was purchased, the date of purchase and the date it was delivered.

[Product_info]{.underline}:

The Product_Info table contains the information for each product. This
table includes a unique product id that is incremented for every product
added, the name of the product, the client price, the manufacturer
price, the product's details, stock, category, and path to its image.

[Product_Comments]{.underline}:

Products can have more than 1 comment, so they are stored in a separate
table. This table includes a unique id that is incremented for every
comment added, the id of the user who added this comment, the product id
of the product the comment is on, and the text of the comment.

[Store_Info]{.underline}:

The store_info table contains information for each store which includes
its unique id, name and location.

[Store_Products]{.underline}:

Each store can have 1 or more products they offer. This table has a
unique store product id, the id of the store and the id of the product.

**Navigation**

The end user and the customer will be both entering the main page:

![](./media/image27.png){width="6.5in" height="4.875in"}

From here, the end user will be able to go to different pages with the
links or the search bar to find the products they need. If the user
doesn't want to search for a product, but want some more information
like our contacts or policies, he can access them from the footer.

![](./media/image20.png){width="7.078125546806649in"
height="0.9270833333333334in"}

The following links lead to these pages:

The logo of the ecom and the Home link both take the user to the main
page.

The categories\' dropdown have links with the product categories which
take you to a page like this:

![](./media/image16.png){width="6.5in" height="4.847222222222222in"}

Where the user will be able to choose the product of his liking or go to
another category.

Next link would be the about link:

![](./media/image1.png){width="6.5in" height="4.138888888888889in"}

The next link would be the contact:

![](./media/image17.png){width="6.5in" height="4.847222222222222in"}

**Next would be the research bar, where the user inputs a word which
needs to match the product he is searching:**

![](./media/image21.png){width="6.5in" height="3.763888888888889in"}

**Next link would be the account link which serves as a double purpose
button if your not logged in then it will redirect you to the login
page:**

![](./media/image5.png){width="6.5in" height="3.7222222222222223in"}

**If you don't have an account then you can click [Don\'t have an
account?:]{.mark}**

![](./media/image26.png){width="6.5in" height="3.6805555555555554in"}

**[The second purpose of the account button would be if you are logged
in you can click it to go to your account page:]{.mark}**

![](./media/image25.png){width="6.5in" height="3.75in"}

**From here you can access links like address book, my payment options,
my returns, my cancellations, and the log-out button.**

**Another button would be the cart:**

![](./media/image24.png){width="6.5in" height="3.625in"}

**The next section would be the footer quick links to information about
the ecom:**

**Privacy Policies:**

![](./media/image13.png){width="6.5in" height="3.5972222222222223in"}

**Terms of use:**

![](./media/image22.png){width="6.5in" height="3.4305555555555554in"}

**FAQ:**

![](./media/image4.png){width="6.5in" height="3.4166666666666665in"}

**There are also some links for the account in the footer.**
