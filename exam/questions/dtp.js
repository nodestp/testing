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
		new Question("What is a photoshop?",["Photo Editing software","Graphic Softwares","Designing  Softwares","Accounting Software"],"Photo Editing software"),
		new Question("What is a Short key of Move Tool in Photoshop?",["Ctrl + V","Alt + V","V","None of the above"],"V"),
		new Question("What is a Short Key of layer in Photoshop?",["Alt + F7","F7","Ctrl + F3","F3"],"F7"),
		new Question("What is a full Form of RGB?",["Red,Green,Blue","Red,gray,Blue","Red,Green,Brown","None of the above"],"Red,Green,Blue"),
		new Question("How many menu bar in Photoshop?",["7","8","9","10"],"9"),
		new Question("How many tools in Photoshop",["55","22","33","44"],"22"),
		new Question("Which company made Image Ready?",["Adobe Systems","Citrix Systems","Cisco Systems","A and B both"],"Adobe Systems"),
		new Question("What is File Extension in Photoshop?",[".Bmp",".Tiff",".Psd",".Txt"],".Psd"),
		new Question("Which menu contains the duplicate layer option in Photoshop?",["Image","Layer","Filter","Edit"],"Layer"),
		new Question("Which of these software is using the Gradient tool?",["Page maker","Painting","Photoshop","All of these"],"Photoshop"),
		new Question("The images are made of ________",["DPI","Pixels","Drawing","Pictures"],"Pixels"),
		new Question("By using which of these options, a new file is created in Photoshop",["File > New","File > Open","Create > New","Start > New File"],"File > New"),
		new Question("What is the shortcut key to create a duplicate layer of a layer?",["Ctrl+J","Ctrl+T","Ctrl+N","Ctrl+D"],"Ctrl+J"),
		new Question("What is the shortcut key to create a new file in Photoshop?",["File, new","Ctrl + N","Ctrl+Shift+N","Shift+N"],"Ctrl + N"),
		new Question("To cut down the size of the entire graphic design, including all layers, you should select the ______ tool.",["marquee","magic wand","eraser","crop"],"crop"),
		new Question("The tool allows you to copy one area of the layer to another area of the layer.",["magic wand","clone stamp","marquee","gradient"],"clone stamp"),
		new Question("The _______ tool allows you to select a rectangular or circular area of an layer to change or delete.",["marquee","crop","hand","zoom"],"marquee"),
		new Question("To undo the last change made to your graphic design, the keys may be used",["Ctrl + D","Ctrl + Z","Shift + D","Shift + Z"],"Ctrl + Z"),
		new Question("To turn-off the use of a tool, or deselect it, you must push the keys.",["Ctrl + Z","Ctrl + D","Shift + Z","Shift + D"],"Ctrl + D"),
		new Question("What is a short key of clone stamp tool ? ",["D","S","A","V"],"S"),
		new Question("To delete items from history, drag them into the trash can.",["True","False","both","none"],"True"),
		new Question("JPEG stands for?",["Joint Photographic Experts Group","Joint Photographic Exports Group","Join Photographic Experts Group","none"],"Joint Photographic Experts Group"),
		new Question("PNG stands for?",["Portable Network Graphics","Portable Network Grap","Port Network Graphics","none"],"Portable Network Graphics"),
    //corel draw questions ............................
		new Question("What is the shortcut key to combine the selected objects?",["CtrI +Y","Ctrl +Q","Ctrl +L","CtrI +K"],"Ctrl +L"),
		new Question("Shft + PgDn is the shortcut key to place the selected object(s) back one position in the object stacking order",["TRUE","FALSE","NONE OF THESE","NONE"],"FALSE"),
		new Question("What is the shortcut key to specifies fountain fills for objects?",["Ctrl + B","F11","Alt + F4","F6"],"F11"),
		new Question("What is the shortcut key to displays a full-screen preview of the graphic or drawing?",["F4","F1","F9","F11"],"F9"),
		new Question("What is the shortcut key to align selected objects to the bottom?",["S","D","B","T"],"B"),
		new Question("We have ____________ paper Orientation in CorelDraw",["1","2","3","4"],"2"),
		new Question("______________ is used for selecting and deselecting objects.",["Bezier tool","freehand tool","shape tool","pick tool"],"pick tool"),
		new Question("CorelDraw is a ____________ based drawing Application Package.",["Photo paint","Bitmap","Vector","Scalar"],"Vector"),
		new Question("Bitmap images are made up of ____________",["Pixels","vectors","particles","lines"],"Pixels"),
		new Question("The shortcut key for accessing symbols and special characters is _________",["Ctrl + F10","Ctrl + F11","Alt + Ctrl F11","Ctrl + SC"],"Ctrl + F11"),
		new Question("What is the default paper type/size when you open CorelDraw windows?",["A4","A1","POST CARD","LETTER"],"LETTER"),
		new Question("The pick tool is used in skewing and scaling objects",["TRUE","FALSE","N/A","N/A"],"TRUE"),
		new Question("The zoom tool is used for ___________ objects.",["Magnifying","cropping","marquee selecting","embedding"],"Magnifying"),
		new Question("In Corel Draw the keyboard shortcut to save your drawing is",["Ctrl + S","Ctrl +c","Ctrl +z","Ctrl +Y"],"Ctrl + S"),
		new Question("How can you import multiple consecutive files in one go?",["Shift + Select the first and last files","Control + Select the first and last files","Alt + Select the first and last files","Shift + Control + Alt + Select the first and last files"],"Shift + Select the first and last files"),
		new Question("What is a extention name of Corel draw",[".cdr",".crd",".drc",".rcd"],".cdr"),
		new Question("What is a shortkey of lens",["Ctrl + F3","Alt + F3","F3","F5"],"Alt + F3"),
		new Question("how Many Types of text in corel draw",["1","2","3","4"],"2"),
		new Question("What is a short key of text in corel draw",["F6","F7","F8","F9"],"F8"),
		new Question("What is a short key of Rectangle tool",["F6","F7","F8","F9"],"F6"),
		new Question("What is a short key of Import",["Ctrl + U","Ctrl + Z","Ctrl + I","Ctrl + E"],"Ctrl + I"),
		new Question("What is a short key of Export",["Ctrl + U","Ctrl + Z","Ctrl + I","Ctrl + E"],"Ctrl + E"),
		new Question("What is a full form of PDF",["Portable Document Format","Portable Disk Format","Process Document Format","none of the above"],"Portable Document Format"),
		new Question("F10 is a shortkey of________",["Beiser Tool","Shape Tool","Free Hand Tool","none of the above"],"Shape Tool"),
		new Question("What is a ShortKey of freehand Tool",["F5","F6","F3","F2"],"F5"),
		//pagemaker questions
        new Question("Shortcut Key of UNDO is –",["Ctrl + X","Ctrl + H","Ctrl + Y","Ctrl + Z"],"Ctrl + Z"),
		new Question("What is the character to be shortened to its normal shape and display something below its location ?",["Superscript","Drop Cap","Subscript","Alignment"],"Subscript"),
		new Question("What is the character displayed by showing it slightly above its normal size?",["Superscript","Drop Cap","Subscript","Alignment"],"Superscript"),
		new Question("Which page size paper is used in the laser printer?",["A4","Letter","Legal","All of these"],"All of these"),
		new Question("The layout of the page depends on_____",["On page size","On Text","On Paragraph","All of these"],"On page size"),
		new Question("Which of these software can be a master page?",["PageMaker","Painting","Photoshop","All of these"],"PageMaker"),
		new Question("What is the extension of file created in PageMaker ?",["Psd","Pmd","Tiff","Txt"],"Pmd"),
		new Question("Which company had developed PageMaker?",["Microsoft","Adobe Corporation","Aldus Corporation","Intel"],"Adobe Corporation"),
		new Question("Which menu contains the Find option in Pagemaker?",["Edit","Insert","Utilities","View"],"Utilities"),
		new Question("When did Pagemaker begin?",["1980","1985","1990","1995"],"1985"),
		new Question("How many columns are in the newspaper?",["10","9","8","7"],"8"),
		new Question("Which one of these is not size of paper ?",["A1","A3","A5","A6"],"A6"),
		new Question("What is the first step of the page layout for desktop publishing ",["Selecting Page Size","Selecting Page Border","Selecting the page margin","None of these"],"Selecting Page Size"),
		new Question("Which of the following is not a menu in PageMaker ?",["Elements","Type","Utilities","Format"],"Format"),
		new Question("The Shortcut key of ZOOM OUT is ",["Ctrl + +","Ctrl + –","Ctrl + O","Ctrl + Z"],"Ctrl + –"),
		new Question("How many menus are there in PageMaker ?",["6","7","8","9"],"9"),
		new Question("Which option is used to import images on the page in Page Maker ?",["Open","New","Insert","Place"],"Place"),
		new Question("Which menu contains the font option in PageMaker ?",["Layout","Type","Utilities","Element"],"Type"),
		new Question("Which menu contains the frame option in PageMaker?",["File","Utilities","Element","None of these"],"Element"),
		new Question("How many types of screen view in PageMaker?",["2","3","4","5"],"2"),
		new Question("Which of these views is not in the PageMaker?",["Layout View","Story Editor View","Outline View","None of these"],"Outline View"),
		new Question("Which option is used to display master items on a page in PageMaker ?",["Display Master Item","Show Master Item","View Master Item","Insert Master Items"],"Display Master Item"),
		new Question("Which menu contains Insert Pages option ?",["File","Layout","Element","Utilities"],"Layout"),
		new Question("How many alignments are there in PageMaker ?",["3","4","5","6"],"5"),
		new Question("Which menu contains the Story Editor option ?",["File","Edit","View","Insert"],"Edit"),
		new Question("What are the shortcut to window fit in window in Pagemaker ?",["Ctrl+0","Ctrl+1","Ctrl+2","Ctrl+3"],"Ctrl+0"),
		new Question("What is a Shortkey of Edit Story ?",["Ctrl + I","Ctrl + E","Alt +E","none of these"],"Ctrl + E")
	 
	
];

// create quiz
var quiz = new Quiz(questions);

// display quiz
populate();





