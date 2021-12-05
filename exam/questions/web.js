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
		new Question("HTML Stands for?",["Hyper Text Markup Language","Hyper Text Marking Language","Hyper Technical Markup Language","Hyper Technical Marking Language"],"Hyper Text Markup Language"),
		new Question("TCP/IP stands for?",["Transmission Control Protocol/ Internet Protocol","Transit Control Protocol/ Internet Protocol","Transmission Calling Protocol/ Internet Protocol","None of the above"],"Transmission Control Protocol/ Internet Protocol"),
		new Question("................tag defines the top - most elements identifying it as an HTML document.",["html","head","title","body"],"html"),
		new Question("How many heading tags are in HTML document?",["1","4","6","7"],"6"),
		new Question("Which of these is system software.",["Windows 10","Ms - Office","Photoshop","Corel Draw X7"],"Windows 10"),
		new Question("How many levels of languages",["1","2","3","4"],"3"),
		new Question("Which type of languages are used to develop an operating system ?",["Low Level","Middle Level","Low Level & Middle Level both","High Level"],"Low Level & Middle Level both"),
		new Question("Which type of languages are used to develop an application software ?",["Low Level","Low Level & High Level both","High Level","Middle Level"],"High Level"),
		new Question("How many types of networks ?",["1","2","3","4"],"3"),
		new Question("What is http ?",["Hyper text transmission protocol","Hyper transmission text protocol","Hyper text transfer protocol","None of the above"],"Hyper text transfer protocol"),
		new Question("Which of the following tag does not require a terminator?",["&#x3C;U&#x3E;","&#x3C;BR&#x3E;","&#x3C;B&#x3E;","None of these"],"&#x3C;BR&#x3E;"),
		new Question("The ............ tag allows you to add horizontal rules across the web pages.",["&#x3C;BR&#x3E;","&#x3C;HR&#x3E;","&#x3C;UR&#x3E;","&#x3C;MU&#x3E;"],"&#x3C;HR&#x3E;"),
		new Question("The..............tag allows you to specify the size and color of a section of text.",["&#x3C;FONT&#x3E;","&#x3C;BASEFONT&#x3E;","&#x3C;PRE&#x3E;","None of these"],"&#x3C;FONT&#x3E;"),
		new Question("Which one of the following tag is used to insert graphics in the web page?",["&#x3C;image&#x3E;","&#x3C;images&#x3E;","&#x3C;img&#x3E;","&#x3C;graphics&#x3E;"],"&#x3C;img&#x3E;"),
		new Question("How many types of HTML tags are there?",["2","3","4","6"],"2"),
		new Question("Which of the following attribute of the BODY tag allows you to specify a background image",["bgcolor","background","bgbackground","None of these"],"background"),
		new Question("The default font size of the FONT tag is?",["1-3","1-9","0-8","1-7"],"1-7"),
		new Question("BGCOLOR is not an attribute of?",["&#x3C;body&#x3E;","&#x3C;table&#x3E;","&#x3C;marquee&#x3E;","None of these"],"None of these"),
		new Question("How many types of list are there in HTML?",["1","2","3","4"],"2"),
		new Question("Which editor is used for coding html?",["Notepad","Edit Pad","Front Page","Word Pad"],"Notepad"),
		new Question("LAN stands for?",["Local Area Network","Local Air Network","Local Area Net","None of the above"],"Local Area Network"),
		new Question("Which of the following is not an HTML tag?",["&#x3C;html&#x3E;","&#x3C;head&#x3E;","&#x3C;tag&#x3E;","&#x3C;span&#x3E;"],"&#x3C;tag&#x3E;"),
		new Question("Radio button and checkbox are used in which tag?",["form","frmae","input","td"],"input"),
		new Question("URL stands for.......",["Universal Resource Locator","Uniform Resource Locator","Universal Research Locator","None of the above"],"Uniform Resource Locator"),
		new Question("The TR and ...............tags are used to create a grid of rows and columns.",["table","tr","td","th"],"td"),
		new Question("To change the size of an image in HTML which attribute we will use?",["pliers","height and width","top and bottom","bigger and smaller"],"height and width"),
		new Question("which of the following tag is used to mark a begining of paragraph ?",["td","br","p","th"],"p"),
		new Question("Correct HTML tag for the largest heading is",["head","h6","heading","h1"],"h1"),
		new Question("Markup tags tell the web browser",["How to organise the page","How to display the page","How to display message box on page","None of these"],"How to display the page"),
		new Question("Which of the following attributes of text box control allow to limit the maximum character?",["size","len","maxlength","all of these"],"maxlength"),
		new Question("Correct HTML to left align the content inside a table cell is",["&#x3C;tdleft&#x3E;","&#x3C;td raligh = 'left'&#x3E;","&#x3C;td align = 'left'&#x3E;","&#x3C;td leftalign&#x3E;"],"&#x3C;td align = 'left'&#x3E;"),
		new Question("Which of the tag is used to creates a number list?",["li","ol","li & ol","ul"],"li & ol"),
		new Question("INPUT tag is",["format tag","empty tag","both (a) and (b)","none of these"],"empty tag"),
		new Question("The latest HTML standard is",["XML","SGML","HTML 4.0","HTML 5.0"],"HTML 5.0"),
		new Question("The body tag usually used after",["Title tag","HEAD tag","EM tag","FORM tag"],"HEAD tag"),
		new Question("The web standard allows programmers on many different computer platforms to dispersed format and display the information server. These programs are called",["Web Browsers","HTML","Internet Explorer","None of these"],"Web Browsers"),
		new Question("How Many types of StyleSheets",["1","2","3","4"],"3"),
		new Question("If we want define style for an unique element, then which css selector will we use ?",["Id","text","class","name"],"Id"),
		new Question("If we don't want to allow a floating div to the left side of an element, which css property will we use ?",["margin","clear","float","padding"],"clear"),
		new Question("Suppose we want to arragnge five nos. of DIVs so that DIV4 is placed above DIV1. Now, which css property will we use to control the order of stack?",["d-index","s-index","x-index","z-index"],"z-index"),
		new Question("Can we align a Block element by setting the left and right margins ?",["Yes, we can","Not Possible","None","None"],"Yes, we can"),
		new Question("Can we define the text direction via css property ?",["Yes, we can","No, we can't","None","None"],"Yes, we can"),
		new Question("If we want to use a nice looking green dotted border around an image, which css property will we use?",["border-color","border-decoration","border-style","border-line"],"border-style"),
		new Question("What should be the table width, so that the width of a table adjust to the current width of the browser window?",["640 pixels","100%","full-screen","1024 px"],"100%"),
		new Question("Which element is used in the HEAD section on an HTML / XHTMLpage, if we want to use an external style sheet file to decorate the page ?",["src","link","style","css"],"link"),
		new Question("Which attribute can be added to many HTML / XHTML elements to identify them as a member of a specific group ?",["Id","div","class","span"],"class"),
		new Question("How can we write comment along with CSS code ?",["/* a comment */","// a comment //","/ a comment /","none of these"],"/* a comment */"),
		new Question("Which css property you will use if you want to add some margin between a DIV's border and its inner text ?",["spacing","margin","padding","inner-margin"],"padding"),
		new Question("Which CSS property is used to control the text size of an element ?",["font-style","text-size","text-style","font-size"],"font-size"),
		new Question("The default value of position attribute is _________.",["fixed","absolute","relative","inherit"],"relative"),
		new Question("How will you make all paragraph elements 'RED' in color ?",["p.all {color: red;}","p.all {color: #990000;}","all.p {color: #998877;}","p {color: red;}"],"p {color: red;}"),
		new Question("By default Hyperlinks are displayed with an underline. How do you remove the underline from all hyperlinks by using CSS code ?",["a {text: no-underline;}","a {text-decoration:none;}","a {text-style: no-underline;}","a {text-decoration: no-underline;}"],"a {text-decoration:none;}"),
		new Question("Which of the following property is used to change the face of a font?",["font-family","font-style","font-variant","font-weight"],"font-family"),
		new Question("Which of the following property is used to set the width of an image?",["border","height","width","-moz-opacity"],"width"),
		new Question("Which of the following property changes the color of top border?",["border-top-color","border-left-color","border-right-color","border-bottom-color"],"border-top-color"),
		new Question("What does CSS stand for?",["Creative Style Sheets","Colorful Style Sheets","Cascading Style Sheets","Computer Style Sheets"],"Cascading Style Sheets"),
		new Question("Where in an HTML document is the correct place to refer to an external style sheet?",["At the end of the document","In the head section","At the top of the document","In the body section"],"In the head section"),
		new Question("Which HTML tag is used to define an internal style sheet?",["style","css","script","None"],"style"),
		new Question("Which HTML attribute is used to define inline styles?",["font","class","styles","style"],"style"),
		new Question("Which is the correct CSS syntax?",["body {color: black}","{body;color:black}","{body:color=black(body}","body:color=black"],"body {color: black}"),
		new Question("How do you add a background color for all h1 elements?",["all.h1 {background-color:#FFFFFF}","h1.all {background-color:#FFFFFF}","h1 {background-color:#FFFFFF}","None of these"],"h1 {background-color:#FFFFFF}"),
		new Question("How do you change the text color of an element?",["text-color=","fgcolor:","color:","text-color:"],"color:"),
		new Question("Which CSS property controls the text size?",["font-size","font-style","text-style","text-size"],"font-size"),
		new Question("How do you display hyperlinks without an underline?",["a {text-decoration:no underline}","a {decoration:no underline}","a {text-decoration:none}","a {underline:none}"],"a {text-decoration:none}"),
		new Question("How do you make each word in a text start with a capital letter?",["text-transform:capitalize","You can't do that with CSS","text-transform:uppercase","none of these"],"text-transform:capitalize"),
		new Question("How do you change the font of an element?",["font-family:","font=","f:","None of these"],"font-family:"),
		new Question("How do you make the text bold?",["font:b","font-weight:bold","style:bold","b"],"font-weight:bold"),
		new Question("How do you change the left margin of an element?",["margin:","indent:","margin-left:","text-indent:"],"margin-left:"),
		new Question("You can use the same class on multiple elements.",["yes","no","--","--"],"yes"),
		new Question("Who is develop html",["Charles Babbage","Mark Zukarbak","Team Berners Lee","You"],"Team Berners Lee"),
		new Question("The HTML 5 is developed in ......... year",["2014","2015","2000","1999"],"2014"),
		new Question("The HTML 4.01 is developed in ......... year",["2014","2015","2000","1999"],"1999"),
		new Question("The XHTML is developed in ......... year",["2014","2015","2000","1999"],"2000"),
		new Question("FTP Stands for",["File Transmission Protocol","File Transfer Protocol","Fixed Transfer Protocol","None of these"],"File Transfer Protocol"),
		new Question("What is a hex code of black color",["#ccc","#000","#efefe","none of these"],"#000")
	 
	
];

// create quiz
var quiz = new Quiz(questions);

// display quiz
populate();





