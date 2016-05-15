var verbose = true;

/*
	Creates a handler for a progress bar with id "progressBarID".
	This Handler provides the following functions:
		- step: increases progress bar state by 1 percent
		- increase: increases the progress bar by val percent
		- state: returns the actual state of the progress bar 
		- set: sets the progress bar to percentage %
 */
var createProgressBarHandler = function(progressBarID) {
    var percent = [];
    percent[progressBarID] = 0;

    function move(val) {
        if (percent[progressBarID] + val <= 100) {
            percent[progressBarID] += val;
            $("#" + progressBarID).css("width", percent[progressBarID] + '%');
        }
    }

    function moveTo(percentage) {
        if (percentage <= 100) {
            percent[progressBarID] = percentage;
            $("#" + progressBarID).css("width", percent[progressBarID] + '%');
        }
    }

    return {
        step: function() {
            move(1);
        },
        increase: function(val) {
            move(val);
        },
        set: function(percent) {
            moveTo(percent);
        },
        state: function() {
            return percent[progressBarID];
        }
    }
};
/*
	Loads all Cards from the AllSets-x.json File and generates a table to display the cards
 */
function loadAllCardsTable() {
    ALL_SETS_JSON_URL = "data/AllSets-x.json";

    var allCardsProgressBar = createProgressBarHandler("allCardsProgressBar");

    $.ajax({
                method: "GET",
                url: ALL_SETS_JSON_URL,
                beforeSend: function() {
                    hideCardInfo();
                    showModal("allCardsProgressBarModal");
                    showProgressBar("allCardsProgressBar");
                },
                complete: function() {
                    hideModal("allCardsProgressBarModal");
                    hideProgressBar("allCardsProgressBar");
                    showCardInfo();
                },
                success: function(jsonData) {
                    if (verbose)
                        console.log("done loadAllCardsTable" + ALL_SETS_JSON_URL);
                    //generateAllCardsTable(jsonData);
                    //generateCardSetsGrid(jsonData);
                }
            }

        )
        .progress(function(e) {
            if (e.lengthComputable) {
                var percentage = Math.round((e.loaded * 100) / e.total);
                if (verbose)
                    console.log("AllCards JSON Ajax Request Percentage: " + percentage);
                allCardsProgressBar.set(percentage);
            }
        });

    function generateAllCardsTable(jsonData) {
        generateAllCardsTableHeader();
        var allCardsTable = $("#allCardsTable");

        for (var set in jsonData) {
            console.log(set);
        }



    }

    function generateAllCardsTableHeader() {
        var allCardsTableHead = $("#allCardsTable > thead");
        var headerFields = ["name", "manaCost", "type", "rarity", "power", "toughness", "text"];

        for (var i = 0; i < headerFields.length; i++) {
            $(allCardsTableHead).append("<th>" + headerFields[i] + "</th>");
        }
    }


    function generateCardSetsGrid(jsonData) {
        var cnt = 0;
        var currentRow;
        for (var set in jsonData) {
            if (cnt++ % 6 == 0) {
                $("#cardSetsGrid").append("<div id='setRow" + cnt + "' class='w3-row-padding'></div>");
                var currentRow = $("#cardSetsGrid > #setRow" + cnt);
            }
            $(currentRow).append("<div class='w3-col m2 w3-center w3-border w3-round-jumbo'>" + set + "</div>");
        }
    }
}


function hideProgressBar(progressBarID) {
    $("#" + progressBarID).hide();
}

function showProgressBar(progressBarID) {
    $("#" + progressBarID).show();

}

function showModal(modalID) {
    $("#" + modalID).css({
        display: 'block'
    });
}

function hideModal(modalID) {
    $("#" + modalID).css({
        display: 'none'
    });
}

function showCardInfo() {
    $("#cardInfo").show();
}

function hideCardInfo() {
    $("#cardInfo").hide();
}

function main() {
    if (verbose)
        console.log("Entering main");

    loadAllCardsTable();
}

/*
	registers an onClick Event Handler for an element
	- elementID <-> id of the element
	- eventHandler <-> event handler function object
 */
function registerOnClickEventHandler(elementID, eventHandler) {
    //TODO
}

$(document).ready(function() {
    main();
});
