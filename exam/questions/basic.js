function populate() {
    if(quiz.isEnded()) {
        showScores();
    }
    else {
        // show question
        var element = document.getElementById("question");
        element.innerHTML = quiz.getQuestionIndex().text;

        // show options
        var choices = quiz.getQuestionIndex().choices;
        for(var i = 0; i < choices.length; i++) {
            var element = document.getElementById("choice" + i);
            element.innerHTML = choices[i];
            guess("btn" + i, choices[i]);
        }

        showProgress();
    }
};

function guess(id, guess) {
    var button = document.getElementById(id);
    button.onclick = function() {
        quiz.guess(guess);
        populate();
    }
};


function showProgress() {
    var currentQuestionNumber = quiz.questionIndex + 1;
    var element = document.getElementById("progress");
    element.innerHTML = "Question " + currentQuestionNumber + " of " + quiz.questions.length;
};

function showScores() {
    var gameOverHTML = "<h1>Result</h1>";
    gameOverHTML += "<h2 id='score'> Your scores: " + quiz.score + "</h2>";
    var element = document.getElementById("quiz");
    element.innerHTML = gameOverHTML;
};

// create questions
var questions = [
		new Question("RAM stand for __________ .",["Random Access Memory","Regular Access Memory","Random Access Method","Ready Access Memory"],"Random Access Memory"),
		new Question("What is full form of ROM?",["Register Only Memory","Read Only Method","Read Only Memory","None Of These"],"Read Only Memory"),
		new Question("How many function keys on the computer keyboard?",["10","11","12","13"],"12"),
		new Question("Which of these is not an output device?",["Plotter","Monitor","Display terminals","Joy stick"],"Joy stick"),
		new Question("Who is known as the father of computer?",["Charlie Babbage","Charles Babbage","Charles Darwin","Charles Baboon"],"Charles Babbage"),
		new Question("1KB is equal to __________ bytes.",["1024","24","8192","None of these"],"1024"),
		new Question("Which is the largest unit of memory in the following?",["TB","GB","MB","KB"],"TB"),
		//<!--Ms-Paint Questions5-->
		new Question("What is the extension name of MS-Paint in Window 7?",[".PNG",".BMP",".JPG",".DOCX"],".PNG"),
		new Question("What is the short key of Cut?",["Ctrl + C","Ctrl + X","Ctrl + F","Ctrl + O"],"Ctrl + X"),
		new Question("To open the MS-Paint using Run dialog box, we need to type _________..",["Paint","mspaint","Microsoft Paint","piant"],"mspaint"),
		new Question("What is the maximum zoom level in Ms-Paint in window 7?",["100%","200%","800%","400%"],"800%"),
		new Question("What is the minimum zoom level in Ms-Paint in window 7?",["10%","0%","12.5%","15%"],"12.5%"),
		//<!-- Wordpad Questions9-->
		new Question("What is the extension name of Wordpad in Window 7?",[".TXT",".RTF",".RFT",".DOC"],".RTF"),
		new Question("Notepad is a .",["Text editor","Rich text editor","Document editor","None of these"],"Text editor"),
		new Question("What is the full form of RTF?",["Rich Text Format","Right Text File","Right Text Format","Rich Text File"],"Rich Text Format"),
		new Question("What is the short key of Find?",["Ctrl + Z","Ctrl + F","Ctrl + H","Ctrl + R"],"Ctrl + F"),
		new Question("How many types of Alignment in wordpad?",["3","10","4","6"],"4"),
		new Question("What is the short key of Bold?",["Ctrl + B","Ctrl + A","Ctrl + Z","Ctrl + U"],"Ctrl + B"),
		new Question("What is the short key of replace?",["Ctrl + Z","Ctrl + A","Ctrl + H","Ctrl + R"],"Ctrl + H"),
		new Question("Which is the maximum font size in wordpad?",["72","1000","1600","1638"],"1638"),
		new Question("Which is the minimum font size in wordpad?",["1","0","4","8"],"1"),
		//<!-- Ms-Word Questions16-->
		new Question("What is the extention name of Ms-Word 2010?",[".DOCX",".DOX",".DCX",".DOC"],".DOCX"),
		new Question("What is the short key of Format painter?",["Ctrl + C","Ctrl + Shift + C","Alt + C","Alt + Shift + C"],"Ctrl + Shift + C"),
		new Question("Which Short key to use Change Case?",["Ctrl + Shift + F3","Ctrl + F3","Alt + Shift + F3","Shift + F3"],"Shift + F3"),
		new Question("Ctrl + Enter is short key for _________.. ",["Line break ","Page break","Object properties","object"],"Page break"),
		new Question("What is the short key of hyperlink?",["Shift + K","Ctrl + k","Alt + K","Ctrl + Shift + K"],"Ctrl + k"),
		new Question("How many types of dropcap",["1","2","3","4"],"2"),
		new Question("11 X 8.5 inch is size of ________ ?",["Letter page","A4 size page","A3 size page","A1 size page"],"Letter page"),
		new Question("How many types of orientation?",["1","2","3","4"],"2"),
		new Question("What is a use of table of contents?",["For creating paragraph","For creating a table","for creating a index","for creating a web page"],"for creating a index"),
		new Question("The object option in which menu ?",["Home","Insert","Page Layout","View"],"Insert"),
		new Question("Why we using a mail merge?",["for sending a phone no.","for creating a Templets","for creating a Envelopes","for creating a Letters"],"for creating a Letters"),
		new Question("What is the short key of spelling & Grammer in Ms-Word?",["F8","F7","F1","F4"],"F7"),
		new Question("How many types of view in Ms-Word?",["2","3","4","5"],"5"),
		new Question("maximum zoom level in the Ms-word ________.",["400%","600%","500%","800%"],"500%"),
		new Question("What is the short key of Macros in ms-word?",["Alt + F8","Ctrl + F8","Alt + F10","Ctrl + F11"],"Alt + F8"),
		new Question("What is the minimun zoom level in Ms-Word",["100%","15%","0.5%","10%"],"10%"),
		//<!-- Ms-Excel Questions23-->
		new Question("What is the extention name of excel worksheet 2010?",[".XLAS",".XLW",".XLWX",".XLSX"],".XLWX"),
		new Question("How many rows in Ms-Excel 2010?",["1048576","1048574","5048576","16384"],"1048576"),
		new Question("How many Coloumns in Ms-Excel 2010?",["1638","16384","15896","13246"],"16384"),
		new Question("How many Default sheet given in Ms-Excel 2010?",["2","3","4","5"],"3"),
		new Question("Which Formula you use to add two numbers?",["=product","=fact","=sum","=round"],"=sum"),
		new Question("What happen when use formula =product",["Addition","Subtraction","Multiply","Division"],"Multiply"),
		new Question("Which function in Excel tells how many numeric entries are there ?",["NUM","COUNT","SUM","CHKNUM"],"COUNT"),
		new Question("Statistical calculations and preparation of tables and graphs can be done using",["Adobe Photoshop","Excel","Notepad","Power Point"],"Excel"),
		new Question("Which one is not a Function in MS Excel ?",["SUM","MAX","AVG","MIN"],"AVG"),
		new Question("Functions in MS Excel must begin with ___",["An () sign","An Equal Sign","A Plus Sign","A > Sign"],"An Equal Sign"),
		new Question("Which functionin Excel checks whether a condition is true or not ?",["SUM","COUNT","IF","AVERAGE"],"IF"),
		new Question("In Excel, Columns are labelled as ___",["A, B, C, etc","1,2,3 etc","A1, A2, etc.","$A$1, $A$2, etc."],"A, B, C, etc"),
		new Question("The process of arrenging the items of a column in some sequence or order is known as :",["Arrenging","Autofill","Filtering","Sorting"],"Sorting"),
		new Question("The ____ feature of MS Excel quickly completes a series of data",["Auto Complete","Auto Fill","Fill Handle","Sorting"],"Auto Fill"),
		new Question("In Excel Rows are labelled as ______",["A, B, C, etc","1,2,3 etc","A1, A2, etc.","$A$1, $A$2, etc."],"1,2,3 etc"),
		new Question("Which keys are used to open print tab in Ms Excel?",["Ctrl + P","Ctrl + Z","Ctrl + U","Ctrl + D"],"Ctrl + P"),
		new Question("What is the short key of Filter in Ms-Excel?",["Ctrl + L","Shift + L","Ctrl + Shift + L","Shift + Alt + L"],"Ctrl + Shift + L"),
		new Question("MS Excel is a ________.",["Word Processing Program","Spreadsheet Program","Presentation Program","None of the above"],"Spreadsheet Program"),
		new Question("The cell reference for cell range of A2 to M12 is _______",["A2!M12","A2.M12","A2;M12","A2:M12"],"A2:M12"),
		new Question("Which function will you use to enter current Date & time in a worksheet cell ?",["=currentTime()","=time()","=now()"," All of the above"],"=now()"),
		new Question("What is entered by the function =today()",["Today’s date as Text format","Current date","Current time","None of the above"],"Current date"),
		new Question("What is the short cut key to replace a data with another in sheet ?",["Ctrl + H","Ctrl + Shift + R","Ctrl + R","All of the above"],"Ctrl + H"), 
		new Question("Which of the following is not a term of MS-Excel ?",["Document","Cells","Rows","Workbook"],"Document"),
		//<!-- Ms-Power point Questions8-->
		new Question("What is the extension name of Ms-Power point 2010?",[".PPT",".PPTX",".PNT",".PNTX"],".PPTX"),
		new Question("Which file format can be added to a PowerPoint show ?",[".gif",".jpg",".wav","All of above"],"All of above"),
		new Question("Special effects used to introduce slides in a presentation are known as ?",["transitions","effects","custom animations","annotations"],"transitions"),
		new Question("Which key can be used to view Slide show ?",["F5","F2","F7","F1"],"F5"),
		new Question("How can we view slide show repeated continuously ?",["repeat continuously","loop continuously until ‘Esc’","loop more","none"],"loop continuously until ‘Esc’"),
		new Question("To open the existing presentation press",["CTRL + A","CTRL + O","CTRL + N","CTRL + L"],"CTRL + O"),
		new Question("Which key do you press to check spelling ?",["F3","F5","F7","F9"],"F7"),
		new Question("To open the MS-PowerPoint using Run dialog box, we need to type _________..",["powerpoint","pptx","pwrpoint","powerpnt"],"powerpnt"),
		//<!-- Ms-Access Questions-->
		new Question("What is the Extention name of Ms-Access 2010?",[".ACC",".ACCDB",".ACCD",".ACCB"],".ACCDB"),
		new Question("In a database table, the category of information is called ________",["record","tuple","field","None of the above"],"field"),
		new Question("This key uniquely identifies each record",["key record","Composite keY","foreign key","primary key"],"primary key"),
		new Question("Which of the following database object produces the final result to present ?",["Tables","Reports","Queries","None of the above"],"Reports"),
		new Question("What are the columns in a Microsoft Access table called ?",["Reports","Rows","Fields","Records"],"Fields"),
		new Question("Microsoft Access is a",["OODBMS","ORDBMS","RDBMS","None of the above"],"RDBMS"),
		new Question("what is computer?",["Electronic device","clock","pen","none of these"],"Electronic device")

  
];

// create quiz
var quiz = new Quiz(questions);

// display quiz
populate();





