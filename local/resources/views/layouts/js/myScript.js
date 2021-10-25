document.addEventListener('DOMContentLoaded', () => {
    var p = document.getElementById('playerName');
    var DefaultplayerName = p.textContent;
    var turn = 0;
    const userGrid = document.querySelector('.grid-user')
    const enemyGrid = document.querySelector('.grid-enemy')
    const displayGrid = document.querySelector('.grid-display')
    const ships = document.querySelectorAll('.ship')
    const destroyer = document.querySelector('.destroyer-container')
    const submarine = document.querySelector('.submarine-container')
    const cruiser = document.querySelector('.cruiser-container')
    const battleship = document.querySelector('.battleship-container')
    const carrier = document.querySelector('.carrier-container')
    const startButton = document.querySelector('#start')
    const turnDisplay = document.querySelector('#whose-go')
    const winerAlarm = document.querySelector('#winer')
    const yourScore = document.querySelector('#yourScore')
    const myShips = []
    const enemyShips = []
    let isHorizontal = true
    const width = 10


    //Create Base
    function createBase(grid, squares) {
        for (let i = 0; i < width * width; i++) {
            const square = document.createElement('div')
            square.dataset.id = i
            grid.appendChild(square)
            squares.push(square)
        }
    }
    createBase(userGrid, myShips)
    createBase(enemyGrid, enemyShips)


    //Drag Ships
    ships.forEach(ship => ship.addEventListener('dragstart', dragStart))
    myShips.forEach(square => square.addEventListener('dragstart', dragStart))
    myShips.forEach(square => square.addEventListener('dragover', dragOver))
    myShips.forEach(square => square.addEventListener('dragenter', dragEnter))
    myShips.forEach(square => square.addEventListener('dragleave', dragLeave))
    myShips.forEach(square => square.addEventListener('drop', dragDrop))
    myShips.forEach(square => square.addEventListener('dragend', dragEnd))


    let selectedShipNameWithIndex
    let draggedShip
    let draggedShipLength

    ships.forEach(ship => ship.addEventListener('mousedown', (e) => {
        selectedShipNameWithIndex = e.target.id
    }))

    function dragStart() {
        draggedShip = this
        draggedShipLength = this.childNodes.length
       
    }

    function dragOver(e) {
        e.preventDefault()
    }

    function dragEnter(e) {
        e.preventDefault()
    }

    function dragLeave() {
       
    }

    // Drop Ships
    function dragDrop() {

        let shipNameWithLastId = draggedShip.lastChild.id
        let shipClass = shipNameWithLastId.slice(0, -2)
        // console.log('shipClass',shipClass)
        let lastShipIndex = parseInt(shipNameWithLastId.substr(-1))
        let shipLastId = lastShipIndex + parseInt(this.dataset.id)

        const notAllowedHorizontal = [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 1, 11, 21, 31, 41, 51, 61, 71, 81, 91, 2, 22, 32, 42, 52, 62, 72, 82, 92, 3, 13, 23, 33, 43, 53, 63, 73, 83, 93]
        const notAllowedVertical = [99, 98, 97, 96, 95, 94, 93, 92, 91, 90, 89, 88, 87, 86, 85, 84, 83, 82, 81, 80, 79, 78, 77, 76, 75, 74, 73, 72, 71, 70, 69, 68, 67, 66, 65, 64, 63, 62, 61, 60]

        selectedShipIndex = parseInt(selectedShipNameWithIndex.substr(-1))
        //   console.log('selectedShipIndex',selectedShipIndex)

        shipLastId = shipLastId - selectedShipIndex

        let newNotAllowedHorizontal = notAllowedHorizontal.splice(0, 10 * lastShipIndex)
        let newNotAllowedVertical = notAllowedVertical.splice(0, 10 * lastShipIndex)


        if (isHorizontal && !newNotAllowedHorizontal.includes(shipLastId)) {
            for (let i = 0; i < draggedShipLength; i++) {
                myShips[parseInt(this.dataset.id) - selectedShipIndex + i].classList.add('taken', shipClass)

            }
        } else if (!isHorizontal && !newNotAllowedVertical.includes(shipLastId)) {
            for (let i = 0; i < draggedShipLength; i++) {
                myShips[parseInt(this.dataset.id) - selectedShipIndex + width * i].classList.add('taken', shipClass)
            }
        } else return
          
        // Record Ships position in database  
        $.ajax({
            type: "GET",
            url: "https://whendeals.com/autoPassData/firstfetch",
            data: {
                shipLastId: shipLastId,
                selectedShipIndex: selectedShipIndex,
                draggedShipLength: draggedShipLength,
                shipClass: shipClass,
                isHorizontal: isHorizontal,
                DefaultplayerName: DefaultplayerName,
                lastShipIndex: lastShipIndex,
                datasetId: parseInt(this.dataset.id),

            },
            success: function(data) {
               

            }
        });

        displayGrid.removeChild(draggedShip)

    }

    function dragEnd() {
       
    }




    //   Take the enemy ships positions and create their ships
    function DropNewPlayer() {
       
        const notAllowedHorizontal = [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 1, 11, 21, 31, 41, 51, 61, 71, 81, 91, 2, 22, 32, 42, 52, 62, 72, 82, 92, 3, 13, 23, 33, 43, 53, 63, 73, 83, 93]
        const notAllowedVertical = [99, 98, 97, 96, 95, 94, 93, 92, 91, 90, 89, 88, 87, 86, 85, 84, 83, 82, 81, 80, 79, 78, 77, 76, 75, 74, 73, 72, 71, 70, 69, 68, 67, 66, 65, 64, 63, 62, 61, 60]
        var datasetId = '';
        var shipLastId = '';
        var selectedShipIndex = '';
        var draggedShipLength = '';
        var shipClass = '';
        var isHorizontal = '';
        var lastShipIndex = '';
        var playerName = '';

        $.ajax({
            type: "GET",
            url: "https://whendeals.com/autoPassData/fetchData",
            data: {
                DefaultplayerName: DefaultplayerName,
            },
            success: function(data) {
                // console.log('data',data)
                const myArr = JSON.parse(data, function(key, value) {
                    if (key == "datasetId") {
                        datasetId = value;
                    } else if (key == "shipLastId") {
                        shipLastId = value;
                    } else if (key == "selectedShipIndex") {
                        selectedShipIndex = value;
                    } else if (key == "draggedShipLength") {
                        draggedShipLength = value;
                    } else if (key == "shipClass") {
                        shipClass = value;
                    } else if (key == "isHorizontal") {
                        isHorizontal = value;
                    } else if (key == "lastShipIndex") {
                        lastShipIndex = value;
                    } else if (key == "playerName") {
                        playerName = value;

                        let newNotAllowedHorizontal = notAllowedHorizontal.splice(0, 10 * lastShipIndex)
                        let newNotAllowedVertical = notAllowedVertical.splice(0, 10 * lastShipIndex)

                        if (isHorizontal && !newNotAllowedHorizontal.includes(shipLastId)) {
                            for (let i = 0; i < draggedShipLength; i++) {
                                enemyShips[(datasetId - selectedShipIndex) + i].classList.add('hidden', 'taken', shipClass)
                            }
                        } else return
                    }

                });
            }
        });
    }

    // Active enent by clicking on the enemy base 
    startButton.addEventListener('click', playGame)

     // Start the game
    function playGame() {
        DropNewPlayer();
        startGame();
    }

    function startGame() {
        // Shows player's turn
        $.ajax({
            type: "GET",
            url: "https://whendeals.com/autoPassData/fetchTurnData",
            data: {
                DefaultplayerName: DefaultplayerName,
            },
            success: function(data) {
                turn1 = data;
                if (turn1 == 0) {
                    turnDisplay.innerHTML = 'Your Turn'
                } else {
                    turnDisplay.innerHTML = 'Wait for Your Competitor'
                }

            }
        });

       
        enemyShips.forEach(square => square.addEventListener('click', function(e) {
            $.ajax({
                type: "GET",
                url: "https://whendeals.com/autoPassData/fetchTurnData",
                data: {
                    DefaultplayerName: DefaultplayerName,
                },
                success: function(data) {
                    turn1 = data;
                    if (turn1 == 0) {
                        fire(square)
                        turnDisplay.innerHTML = 'Wait for Your Competitor'
                        $.ajax({
                            type: "GET",
                            url: "https://whendeals.com/autoPassData/updateTurnData",
                            data: {
                                DefaultplayerName: DefaultplayerName,
                            },

                        });

                    }
                }
            });




        }))
    }

    let destroyerCount = 0
    let submarineCount = 0
    let cruiserCount = 0
    let battleshipCount = 0
    let carrierCount = 0
     // Displays the status of the selected position
    function fire(square) {
        if (!square.classList.contains('boom')) {
            if (square.classList.contains('destroyer')) {
                destroyerCount++;
            }
            if (square.classList.contains('submarine')) submarineCount++
            if (square.classList.contains('cruiser')) cruiserCount++
            if (square.classList.contains('battleship')) battleshipCount++
            if (square.classList.contains('carrier')) carrierCount++
        }
        if (square.classList.contains('taken')) {
            square.classList.add('noneHidden', 'boom')

        } else {
            square.classList.add('miss')
        }

        $.ajax({
            type: "GET",
            url: "https://whendeals.com/autoPassData/storeData",
            data: {
                destroyerCount: destroyerCount,
                submarineCount: submarineCount,
                cruiserCount: cruiserCount,
                battleshipCount: battleshipCount,
                carrierCount: carrierCount,
                square: square.dataset.id,
                DefaultplayerName: DefaultplayerName,

            },
            
            success: function(data) {
                // Check the server to get the other player status
                var timerVal = setInterval(mycode, 1000);

                function mycode() {
                    $.ajax({
                        type: "GET",
                        url: "https://whendeals.com/autoPassData/fetchPlayerData",
                        data: {
                            DefaultplayerName: DefaultplayerName,
                        },
                        success: function(data) {
                            //     alert(data);

                            if (data != 100) {
                                clearInterval(timerVal)
                                // console.log('data98765',data)
                                myShips[data].classList.add('boom')
                                turnDisplay.innerHTML = 'Your Turn'
                                checkSquare()
                            }
                        }
                    });

                }

            }
        });

    }
    var destroyerCount1 = 0;
    var submarineCount1 = 0;
    var cruiserCount1 = 0;
    var battleshipCount1 = 0;
    var carrierCount1 = 0;
    // Check the player Square
    function checkSquare() {
        if (destroyerCount === 2) {
            destroyerCount1 = 100
            console.log('destroyerCount', destroyerCount)
        }
        if (submarineCount === 3) {
            submarineCount1 = 100
            console.log('submarineCount', submarineCount)
        }
        if (cruiserCount === 3) {
            cruiserCount1 = 100
            console.log('cruiserCount', cruiserCount)
        }
        if (battleshipCount === 4) {
            battleshipCount1 = 100
            console.log('battleshipCount', battleshipCount)
        }
        if (carrierCount === 5) {
            carrierCount1 = 100
            console.log('carrierCount', carrierCount)
        }
        yourScore.innerHTML = destroyerCount1 + submarineCount1 + cruiserCount1 + battleshipCount1 + carrierCount1;

        if ((destroyerCount1 + submarineCount1 + cruiserCount1 + battleshipCount1 + carrierCount1) === 500) {
            winerAlarm.innerHTML = "YOU Are The Winer"
            alert('YOU Are The Winer');
        }
    }

})