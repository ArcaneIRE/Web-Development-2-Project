# Library Website Assignment

This project is a library website for my Web Development 2 module. It is built to showcase competency with PHP, alongside small amounts of SQL and HTML/CSS.  

## Functionality

- Login
  - User must be logged in to move throughout the site and use the system
  - New users must register
- Registration
  - Validate details on client and serverside
  - **Unique** username
  - Phone numbers: numeric and 10 characters in length
  - Password: 6+ characters with an additional confirmation check
- Book search
  - By title (fuzzy/partial)
  - By author (fuzzy/partial)
  - By category (using dropdown)
    - Categories should be retrieved from database
  - *No more than 5 rows of data per page*
  - Users should be able to reserve books from this list
- Reservations
  - Book must not have been reserved by anyone else
  - Captures date made
  - Can be removed
  - User can view their reserved books

## Additional Requirements

- Use HTML and CSS to make pages
  - Neat, simple, usable design
  - Must obviously be a library, but no marks for overly elaborate site
- Database must be duplicated exactly from assignment doc
  - It must be possible to add more data during the demo
  - You made add more data as you wish
- Avoid hard coding - site should be dynamic
- Common header and footer on all pages
- Include appropriate error checking

## Database

- `User` Table
  - Each user is uniquely identified by a username
- `Book` Table
  - Indexed by ISBN
- `Category` Table
- `Reserved Books` Table
  - References `User` and `Book` tables

## Submission Requirements

*ONE* PDF file including:

- A list of all PHP files used, with descriptions of:
  - What the file does
  - How it interacts with other pages
- Contains a copy listing of source code
  - Every single line of code must be included
- Contains a 'copy sample' of each screen as it appears in the app
  - Screenshot, I assume?
- A Design Document

## Marking

*All code must be tested thoroughly. It will not be debugged if it does not function as required.*  
*70 Marks total → 70% of CA*

- 30% - Completeness of Functionality
- 20% - Technical Implementation
- 10% - Coding Style/Readability
- 10% - Documentation

### Penalties

- Failure to submit - no marks
- Submission after date but within 1 week - 50% marks
- Submission after 1 week after due date - no marks
  - However, you can get a second try at the demo in week 13 but with a 50% reduction
- Plagiarism - no marks
