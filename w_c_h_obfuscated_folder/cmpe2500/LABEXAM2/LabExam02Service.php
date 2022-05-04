<?php
header("Content-Type: application/json"); // json response expected
// add your db access file here
require_once('dbUtil.php');

// ==============================================================================
// Load the SQL from the provided sql script (words_exam.sql) into your database
// (via phpMyAdmin).
// 
// Inlcude all required web service code in this file (i.e. do all GET/POST 
// checks and functions) use your ICA04 webservice.php file as a template, there
// is no need to protect this file (i.e. do not include a user check).
//
// I recommend starting with your ICA04 and modifying it to support this exam. 
// Create a single page that can be used to test the following requiremetns. You
// do not need to make a fancy display for the returned results. Just dump the
// results onto the page (e.g. in an output div). So, you would have three
// sections: 1 section for partA, one section for partB, and one section for
// partC
// ==============================================================================




// Starting : [5 marks] - if supplied input fails to match a specific task, return a 
//   JSON encoded associative array of either :
//      $_GET the superglobal get array
// OR   $_POST the superglobal post array, whichever has data
// OR   empty array if no data is supplied
// You may add this functionality anywhere, including the end of the file




// Part A : [35 total marks]
// Webservice GET processor : LabExam02Service.php?parta=<int>
// - where <int> represents the length of the word(s) to be extracted from the words_exam table
//
// JSON encoded result will hold : associative_array with 2 fields :
// [10]
// parta_numrows : text_status // of the form : 
//                 "NN rows with word length MM", where
//                  NN is number of rows found with a word length equal to parta GET value
// [15]
// parta_rows : array of rows with a word length equal to parta GET value
//
// Requirements : 
// Using ONLY this query : " select * from words_exam ", with NO where clause, check all the
//   returned rows and programmatically determine if the row matches the desired property,
//   add all matching rows to parta_rows array.
//
// [10] If the row matches the desired property, check if the sha1 field is the same as the PHP SHA1()
//   function return given the word field. If the field and function return do NOT match,
//   insert a key/value pair into the row : 
//     corrupted=true,
//   ensure this row is returned, and can be verified in your json_response
//
// Some example output:
// parta=5 : 25 rows, [{word:WHILE, corrupt:true}, ... ]
// parta=12 : 1 row, [{word:POLYMORPHISM, corrupt:false}]





// Part B : [25 total marks]
// Webservice POST processor : LabExam02Service.php
// POST data key/value : 
//           {"partb":<string>} - where <string> is the string to partially match any word field in table words_exam
//
// JSON encoded result will hold : associative_array with 2 fields :
// [10]
// partb_numrows : textual_status // of the form : 
//                 "NN rows with word that contains S", where
//                  NN is number of rows found where word contains the POST data partb string
// [15 = 10 + 5]
// partb_rows : array of rows matching the string input criteria, no marks unless this constraint applies
//
// Requirements : 
// [10] - Using any retrieval means extract only the word, low, high values of word records ,
// [5] - INCLUDE a calculated field called 'avg', representing the mid point of low and high
//  You may use mySQL or PHP to include this calculated field
//
// Some example output:
// 10 marks output
// partb=W : 7 rows, partb_rows : [{"word":BITWISE", "low":45, "high":174}, {"word":"DWORD", "low":6, "high":64} ... ]
// 10 + 5 marks output
// partb=Z : 1 row, partb_rows: [{"word":"MEMOIZATION","low":"-15","avg":"84.0000","high":"183"}]






// Part C : [Total Max of 30 marks] - Read all options before starting
// Webservice POST processor : LabExam02Service.php
// POST data key/value : 
//           {"partc":<string>} - where <string> is the new word to be added or deleted from the words_exam table
//
// Functionally, the supplied word : if found in the words_exam table, is deleted, 
//                                   if not found in the words_exam table, is inserted
// 
// Requirements : 
// [5] Determine if the supplied partc string parameter currently exists in words_exam,
//  - if so, delete the records as specified below, else insert the records as described below :
//
// Delete the matching words_exam record where the word field exactly matches the supplied partc string parameter
// [5] - delete record using the supplied partc string directly
// OR [10] - retrieve the id primary key using a query with the supplied partc string, then if a single id exists,
//           use the id to delete the record
// JSON encoded result will hold : associative_array with 1 fields :
// partc_status : status string in format of "Deleted record MM",
//                where MM is string used, or the id used, depending on which delete operation was completed
//
// Insert a new record into the words_exam table, use the supplied partc POST parameter as the word,
// and the following options:
// [5] - use a low value of 1, use a high value of 99
// OR [10] - use the largest of all word low values as the low value, use a high value of 99
// OR [15] - use the largest of all word low values as the low value, 
//           use the smallest of all word high values as the high value ( YES, low may be larger than high )
// ** NO literal values may be used for the [10] or [15] mark options.
// ** NO sha1 field value is required to be inserted
// JSON encoded result will hold : associative_array with 1 fields :
// partc_status : status string in format of "Inserted WW for NN marks",
//                where WW is the word inserted, NN is the marks option you implemented
//
// For testing delete : DO NOT delete existing words, either delete words you added or
//   use phpmyadmin ( or other means ) to add extra test words to delete
// 5 mark penalty against Delete marks if your DB table is missing any startup rows
