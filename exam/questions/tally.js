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
		new Question("Tally package is developed by..",["Tally Solutions","Corel Softwares","Vedika Softwares","Peutronics"],"Tally Solutions"),
		new Question("Which menu appears after starting Tally for the first time",["Gateway of Tally","Company Info","Display","None of these"],"Company Info"),
		new Question("Which option is used in Tally to make changes in created company",["Select Company","Shut Company","Alter","None of these"],"Alter"),
		new Question("Which option from Company Info. menu is selected to create a new Company in Tally",["Company Create","Create Company","Create","New Company"],"Create Company"),
		new Question("Which option is used to copy company?s data into pen drive or CD",["Backup","Restore","Split Company Data","Copy Data"],"Backup"),
		new Question("Which option is used to open company created in Tally",["Create Company","Alter","Select Company","Shut Company"],"Select Company"),
		new Question("Which ledger is created by Tally automatically as soon as we create a new company",["Cash","Profit & Loss A/c","Capital A/c","A and B both"],"A and B both"),
		new Question("Which voucher type is used to transfer amount from one bank to another",["Contra","Payment","Receipt","Post-Dated"],"Contra"),
		new Question("What is the meaning of prepaid...",["Paid in advance","Due but not paid","Bank Reconciliation","Depreciation"],"Paid is advance"),
		new Question("Purchase return is also known as...",["Sales return","Return Outwards","Return Inward","Sales"],"Return Outwards"),
		new Question("Closing stock is shown at the...",["Beginning of the accounting year","End of the accounting year","Show the list of Assets","None of these"],"End of the accounting year"),
		new Question("Stock is also known as...",["Work in progress","Raw Material","Assets","Inventory"],"Inventory"),
		new Question("Depreciation means...",["Fall in the value of assets","Increase in the value of assets","Bad debts","None of these"],"Fall in the value of assets"),
		new Question("Goods taken for personal use is debited to...",["Purchase A/c","Cash A/c","Drawings A/c","Bank A/c"],"Drawings A/c"),
		new Question("Rs. 2000 paid as rent should be debited to...",["Cash A/c","Rent A/c","Capital A/c","Bank A/c"],"Rent A/c"),
		new Question("Paid to Mr. Ram Rs. 10000 and they allowed discount, so, then discount should be...",["Indirect Income","Indirect Expense","Direct Expense","None of these"],"Indirect Income"),
		new Question("Paid salary by cheque should be credited to...",["Salary A/c","Bank A/c","Cash A/c","Cheque A/c"],"Bank A/c"),
		new Question("What is the full form of ERP?",["Enterprise Resource Planning","Enterprise Reserve Planning","Enterprise Resource Plan","Enterprise Record Planning"],"Enterprise Resource Planning"),
		new Question("Tally ERP 9 is known as a...",["Database program","Accounting package","Word processor","Language"],"Accounting package"),
		new Question("Which shortcut key is used to activate the calculator?",["Ctrl + M","Ctrl + N","Alt + N","Ctrl + W"],"Ctrl + N"),
		new Question("What is the shortcut key to select a company?",["Alt + F1","Alt + F3","F1","Alt + F9"],"F1"),
		new Question("Which shortcut key is used to delete a company?",["Ctrl + D","Shift + D","Alt + D","Ctrl + Shift + D"],"Alt + D"),
		new Question("By default how many groups are there...",["39","25","34","20"],"34"),
		new Question("Sold goods to Shyam 10,000 classify the voucher...",["Sales","Receipt","Purchase","None of these"],"Sales"),
		new Question("Cash paid to Rajesh Rs. 5000 classify the voucher...",["Payment","Receipt","Sales","None of these"],"Payment"),
		new Question("What is the shortcut key of Journal Voucher?",["F4","F5","F6","F7"],"F7"),
		new Question("Cash withdrawn from bank 1000. Classify the voucher.",["Purchase","Payment","Receipt","Contra"],"Contra"),
		new Question("Received cheque of Rs. 10,000 from Hari. Classify the voucher.",["Receipt","Contra","Journal","None of these"],"Receipt"),
		new Question("Which shortcut key is used to display the budget?",["Ctrl + B","Shift + B","Alt + Ctrl + B","Alt + B"],"Alt + B"),
		new Question("Which shortcut key is used for printing?",["Ctrl + P","Alt + P","Ctrl + Shift + P","Shift + P"],"Alt + P"),
		new Question("What is full form of TDS?",["Tax Deductor at Source","Tax Deductee at Source","Tax Deducted at Source","None of these"],"Tax Deducted at Source"),
		new Question("What is the full form of EPF?",["Employee Payment Fund","Employee Payroll Fund","Employee Provident Fund","None of these"],"Employee Provident Fund"),
		new Question("Which shortcut key is used for payroll voucher?",["Ctrl + F4","Alt + F5","Ctrl + F5","Shift + F5"],"Ctrl + F4"),
		new Question("PAN stands for...",["Personal Account Number","Permanent Account Number","Permanent Access Number","None of these"],"Permanent Account Number"),
		new Question("Which of the following is not a group name...",["Cash in hand","Stock in hand","Fixed liabilities","Current liabilities"],"Fixed liabilities"),
		new Question("What is the full form of POS?",["Point of selling","Point of Sale","Point of Sold","None of these"],"Point of Sale"),
		new Question("Paid Salary by Cheque should be credited to?..",["Salary A/c","Bank A/c","Cash A/c","Cheque A/c"],"Bank A/c"),
		new Question("Sold goods to Krishna. 1000. Classify the voucher?",["Sales","Receipt","Purchase","Payment"],"Sales"),
		new Question("Cash Paid to Rajesh Rs. 5000.Classify the Voucher?",["Payment","Receipt","Sales","None of these"],"Payment"),
		new Question("Discount Column is available in",["Sales Invoice"," Purchase Invoice","Both (a) and (b)","None of these"],"Both (a) and (b)"),
		new Question(" A Ledger can't be deleted if there is any entry",["True","False","not Available","not Available"],"True"),
		new Question("What is the short key of dispay",["Alt + D","D","Ctrl + D","None of These"],"D"),
		new Question("What is the short key of debit note",["Ctrl + F9","Ctrl + F8","Alt + F9","Alt + F8"],"Ctrl + F9"),
		new Question("What is the short key of credit note",["Ctrl + F9","Ctrl + F8","Alt + F9","Alt + F8"],"Ctrl + F8"),
		new Question("What is a short key of Purchase Order.",["Ctrl + F9","Alt + F8","Alt + F5","Alt + F4"],"Alt + F4"),
		new Question("What is a short key of Sale Order.",["Ctrl + F9","Alt + F8","Alt + F5","Alt + F4"],"Alt + F5"),	
		
		new Question("How to change Current Date in Tally ERP 9.",["F1","F2","Alt + F2","F4"],"F2"), 
		new Question("How to change Current Period in Tally ERP 9.",["F1","Alt + F2","F2","F5"],"Alt + F2"), 
		new Question("The Wages paid Ledger Under in ……………",["Indirect Expenses","Indirect income","Direct Expenses","Direct income"],"Direct Expenses"), 
		new Question("Paid Cash to Ram . So The Ram Is ……",["Sundry Creditors","Sundry Debtors","NO","NO"],"Sundry Creditors"), 
		new Question("Purchase Goods From Shyam on Credit. So The Shyam Is.",["Sundry Creditors","Sundry Debtors","NO","NO"],"Sundry Creditors"), 
		new Question("What is The Short Key Of Voucher Change In to Dr Cr Mode.",["Ctrl + I","Ctrl + P","Ctrl + V","Ctrl + D"],"Ctrl + V"), 
		new Question("What is the short key of Delivery Note ..",["Alt + F8","Alt + F9","Alt + F2","Ctrl + F8"],"Alt + F8"), 
		new Question("What is the short key of Receipt Note ..",["Alt + F8","Alt + F9","Alt + F2","Ctrl + F9"],"Alt + F9"), 
		new Question("What is The Short key to see the Balance Sheet.",["Ctrl + B","Ctrl + S","B","S"],"B"), 
		new Question("What is The Full Form of GST.",["Goods & Sales Tax","Goods & Services Tax","Goods & Serious Tax","Goa Services Tax"],"Goods & Services Tax"), 
		new Question("How Many Types Of GST.",["1","2","3","4"],"3"), 
		new Question("CGST  Is Taxable on ..",["Centeral  Tax","State Tax","Integrated tax","None of The Above"],"Centeral  Tax"), 
		new Question("SGST  Is Taxable on ..",["State Tax","Central Tax","Integrated tax","None of The Above"],"State Tax"), 
		new Question("IGST  Is Taxable on ..",["Central  Tax","Integrated tax","State Tax","None of The Above"],"Integrated tax"), 
		new Question("IGST Is Applicable on ..",["Local Sale","Interstate sale","None of These","None of The Above"],"Interstate sale"), 
		new Question("How Many Types of Liabilities.",["1","2","3","4"],"2"), 
		new Question("The Long Term Liabilities is More than.",["6 months","1 year","3 months","9 Months"],"1 year"), 
		new Question("The Short Term Liabilities is Less than.",["6 months","1 year","3 months","9 Months"],"1 year"), 
		new Question("How Many Types of Assets.",["1","2","3","4"],"4"), 
		new Question("The building Under in________ Assets .",["Fixed Assets","Current Assets","Tangible Assets","In tangible Assets"],"Fixed Assets"), 
		new Question("The Cash In Hand Under in _______ Assets",["Current Assets","Fixed Assets","In tangible Assets","Tangible Assets"],"Current Assets"), 
		new Question("The Goodwill Under in ___________ Assets.",["Fixed Assets","Current Assets","Tangible Assets","In tangible Assets"],"In tangible Assets"), 

		new Question("What is a use of GSTR1",["View All Sales Tax","View All Purchase Tax","View Only GST","None of these"],"View All Sales Tax"),
		
		new Question("What is a use of GSTR2",["View Only GST","View All Sales Tax","View All Purchase Tax","None of these"],"View All Purchase Tax"),
		new Question("What is a use of GSTR3B",["View All Sales Tax","View All Purchase Tax","View All Both GST","None of these"],"View All Both GST"),
		new Question("The Units of Measure In _______ Option.",["Accounts Info","Display","Inventory Info","None of these"],"Inventory Info"),
		new Question("What is the first version of tally",["4.0","9","4.5","7.2"],"4.0"),
		new Question("Tally Software is Developed In",["1987","1985","1988","1981"],"1988"),
		new Question("What is a Shortkey of Reversing journal voucher",["F5","F9","F10","none of these"],"F10")
	 
	
];

// create quiz
var quiz = new Quiz(questions);

// display quiz
populate();





