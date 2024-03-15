# The Jewellery Store

## About the Project

The Jewellery Store was the online e-commerce site created as part of Aston University's CS2TP (Team Project) module by
Group 1a.

The team was made up of:

- [Jack Bailey](https://github.com/orgs/CS2TP-Team-1/people/je01b) (Project Manager)
- [Cyrus Zaydan](https://github.com/orgs/CS2TP-Team-1/people/CyrusZaydan)
- [Ajai Aujla](https://github.com/orgs/CS2TP-Team-1/people/AJAISA)
- [Amon Tonui](https://github.com/orgs/CS2TP-Team-1/people/Tonui11)
- [Nayef Alemadi](https://github.com/orgs/CS2TP-Team-1/people/Naalemadi)
- [Hamza Ali](https://github.com/orgs/CS2TP-Team-1/people/hali99)

## The Store

The Jewellery Store sells a range of products including earrings, necklaces, bracelets, watches and rings.
From a customer-facing point, the website features the ability to purchase products, leave reviews on products, return
products that you have purchased and all the standard expected account management related features you'd expect from
an online platform (change password, change email, delete your account, etc.)

## How to Run the Website

### Hosting

For the purposes of the marking of the university module, the site is currently hosted
at https://dolphin-app-7ecsa.ondigitalocean.app/ \
*This hosted version will cease once the marks for the module have been released.*

### Hosting Yourself

1. Clone the GitHub repository
2. In the terminal of your cloned repository run the following commands to successfully install all
   dependencies `composer update` & `composer install`
3. Create a .env file from the [.env.example](.env.example) file in the repository
4. Check line 3 of your .env file, if it doesn't have a value run the command `php artisan key:generate` to generate
   your app key
5. Ensure you have also connected your database in your .env file
6. Run `php artisan migrate` to create the required tables within your database
7. On first run, you will need to create an account as normal using your site, then manually edit in the database
   the `accountType` field to have the value `1` (default value of a boolean true) to set the account to an admin -
   without doing this you will never have any accounts designated as Admins.
8. Once that has been done, you can either use `php artisan serve` or connect your repository to your own hosting to run
   the website


