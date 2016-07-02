NAGARSEVAK REPORT CARD 2016
===========================

Nagarsevak Report Card is a project by a pune based NGO named Parivartan.
It is an attempt to analyze the Development Work undertaken every year by the Nagarsevaks (Corporators) of Pune City from the funds available through Nagarsevak Nidhi (Funds).  

See this website live at : [http://nagarsevak.info](http://nagarsevak.info)

##About Project - Nagarsevak Report Card 2016

Nowadays it has become a cliché to bash politicians just for the sake of it. The uninitiated don’t even know what the work is that our corporators really do. So we at Parivartan came up with an idea to investigate how the corporators spend the funds that are allocated to them, which in case of Pune city corporators is 20 lakhs per year per nagarsevak. Though this amount may seem small, but in 5 years it accounts to a staggering Rs 1 crore, an amount sufficient for implementing and executing various good projects successfully. The only question is “do the corporators have the vision and will to utilize the funds and do the citizens think that this vision is aligned with the needs of their own prabhag”?

In this project, with the help of RTI, we collected all the information of 152 Corporators of Pune about the work that they have executed from the funds they were bound to get between years 2012 to 2016. Then we deduced facts and depicted them in percentage so
that common citizen can understand. This report card, as you will see, includes utilization of funds, highlights of the funds utilized, attendance in General Body(GB) meetings of PMC and the number of questions asked in GB meetings by the corporators.

This Project’s objectives are in complete resonance with Parivartan’s core principles of good governance and are mentioned below :  
1) Complete Transparency in the functioning.  
2) Accountability of the Government.  
3) Proper Planning.  
4) Participation of Citizens.  
5) Voters Awareness.

Thus by this Project we are hoping that citizens would think twice before casting their vote. If you look into the report cards we are not trying to give grades or claim any corporator good or bad.We are nobody to make a comment on that. We are just trying to state the facts and we are resting it on the collective intelligence of all the people to decide who has done a better Job.

We all have got our report cards since school and college. Even in the corporate world, companies have an appraisal system to evaluate an employee. It’s high time that our elected representatives are evaluated and who better than us common citizens to do it!! So we present you with Corporators Report Card. I Think and I Vote. DO YOU?

##Contributors

    Sharvari Gaikwad (sharvari.v.gaikwad@gmail.com), Intern for Startup Partner. Main developer for this project.
    Yatish Devadiga (devadigayatish@gmail.com), Software Engineer - Startup Partner. Technical guide for this project.
    Nikhil Sheth (nikhil.js@gmail.com), Helped with majority of the code.. mainly with Mapbox.
    Mahesh Kajale (m.s.kajale@gmail.com), Helped fixing some issues. Structured the code.

##About Parivartan

PARIVARTAN represents the citizens which are politically and socially active. PARIVARTAN was formed by a group like-minded youth with the sole aim of improving the political and social structure of our society. We aim at mobilizing the Indian masses and spreading political and social awareness. Most of the citizens today are ignorant and unaware. Through Parivartan we wish to bring about change in their mindsets. We also wish to unite all the people whose who wish to work for the betterment of our society.


##About Startup Partner

Startup Partner contributed for this project by developing the website.
StartupPartner(SP) is a trusted development partner for product startup companies across the globe. Our talent management and development processes are geared to meet the needs of rapidly evolving products and dynamic development cycles. We believe in partnering with pioneering start-ups, accelerating innovation and giving robust quality by providing them dedicated engineering unit without external investment. At the same time we create possibility for startups to carve out their own Indian subsidiary while keeping at-most transparency. Our Team has experience in working with cutting edge technology startups in storage, cloud and networking.

##Note :

This project is NOT Copyright protected. You're welcome to fork this project and contribute. Also, if you are an NGO and want to do a similar kind of project in your city, we encourage you to copy our work and code.

##Contacts Us :

    If you need more details about this project, please email at devadigayatish@gmail.com

##Instructions :

1) Clone the project on your machine.  
2) Inside the project folder, execute the following commands :  
cp includes/db_connection.php.sample includes/db_connection.php  
cp includes/email-sender.php.sample includes/email-sender.php  
3) Update your database details in includes/db_connection.php  
4) Update your email sending related configuration in includes/email-sender.php  
5) The main .xlsx files that contain sheets for each prabhag should be present in csv/main-files folder. After running the scripts, the output files will be created in csv folder.  
6) The php scripts should be run in following order :  

	a) **extract_excel_file.php**  
	This script reads each .xlsx file from csv/main-files folder and extracts each worksheet and saves in csv folder as separate csv file.  

	b) **insert_data_from_csv_to_table.php**  
	This script reads each file from csv folder and inserts the records into "csv_data" table and "attendance" table.  

	c) **insert_data_to_nagarsevak.php**  
	This script reads the csv file nagarsevak_info from information folder and inserts the data into "nagarsevak" table.Calculate the total questions and average attendance of each nagarsevak and update the "nagarsevak" table.  

	d) **create_final_table_dow.php**  
	This script reads the data from "csv_data" table and inserts into final table "work_details".  
