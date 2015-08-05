//change 5 to the total number of questions
var total=8
var question=new Array()
for (i=1;i<=total+1;i++){
temp="choice"+i+"=new Array()"
eval(temp)
}
var solution=new Array()

/*Below lists the phrases that will be randomly displayed if the user correctly answers the question. You may extend or shorten this list as desired*/
var compliments=new Array()
compliments[0]="Right answer!"
compliments[1]="You really know your 690 stuff!"
compliments[2]="Wow, you were listening to everything Jimmy said!"
compliments[3]="You're going to rock the 690 final!"
compliments[4]="Correct!"
compliments[5]="Great Job!"
compliments[6]="Good work!"
compliments[7]="You are awesome!"
compliments[8]="Exactly right!"


/*Below lists the questions, its choices, and finally, the solution to each question. Follow the exact format below when editing the questions. You may have as many questions as needed. Check doc at http://javascriptkit.com/script/script2/comboquiz.htm for more info
*/

question[1]="  A gigabyte is how many bytes?"
choice1[1]="  Approximately one million."
choice1[2]="  Approximately one billion."
choice1[3]="  Exactly one million."
choice1[4]="  Approximately one quadrillion."

question[2]="  Where did Jimmy tell us he was born?"
choice2[1]="  Hong Kong"
choice2[2]="  Seattle"
choice2[3]="  Cambridge, MA"
choice2[4]="  Taiwan"

question[3]="  What is the difference between a relative path and an absolute path?"
choice3[1]="  A relative path is approximate; an absolute path is exact."
choice3[2]="  A relative path depends on the time a file is accessed; an absolute path doesn't."
choice3[3]="  These are two different terms for the same thing."
choice3[4]="  A relative path depends on the current file location; an absolute path doesn't."

question[4]="  What does GUI stand for?"
choice4[1]="  Graphical User Interface"
choice4[2]="  Good User Information"
choice4[3]="  Gigabytes Under Input"
choice4[4]="  Gotta Understand Information"

question[5]="  Which is NOT true of XML?"
choice5[1]="  It is a markup language."
choice5[2]="  It is proprietary."
choice5[3]="  It is a subtype of SGML."
choice5[4]="  It will work with different computer platforms."

question[6]="  What did Jimmy say he did over Thanksgiving break?"
choice6[1]="  He figured out how to bypass the DRM controls on Sony CDs."
choice6[2]="  He went skiing."
choice6[3]="  He cooked Thanksgiving dinner for his family."
choice6[4]="  He saw 'Rent' and 'Harry Potter'."

question[7]="  What is a primary key?"
choice7[1]="  The last three numbers of an IP address."
choice7[2]="  In an XML document, the statement that identifies the version and encoding."
choice7[3]="  In a database, a unique identifier composed of one or more attributes."
choice7[4]="  A document whose structure conforms to a certain set of rules."

question[8]="  How can XML solve the problem of chronic hunger?"
choice8[1]="  Give everyone in Africa a browser and the URL for Peapod."
choice8[2]="  Enable Virginia wineries to become much more efficient."
choice8[3]="  Empower the public through nonproprietary encoding of information."
choice8[4]="  All of the above -- and more!"


solution[1]="b"
solution[2]="d"
solution[3]="d"
solution[4]="a"
solution[5]="b"
solution[6]="d"
solution[7]="c"
solution[8]="d"


