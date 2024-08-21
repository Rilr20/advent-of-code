'use strict';

export default {
    part1(file: string): number {
        // Implementation
        /**
         * the head (H) and tail (T) must always be touching (diagonally adjacent and even overlapping both count as touching):
         */
        let rows = file.split("\n")
        let headXPosition: number = 0
        let headYPosition: number = 0
        let tailXPosition: number = 0
        let tailYPosition: number = 0
        let positionsVisited: string[] = []
        rows.forEach(row => {
            // console.log(row)
            let key: string = row.split(" ")[0]
            let amount: number = parseInt(row.split(" ")[1])
            for (let i = 0; i < amount; i++) {
                // console.log("key:" + key)
                // console.log("amount:" + amount)
                // console.log("i:" + i)
                switch (key) {
                    case "R":
                        headXPosition = headXPosition + 1
                        break;
                    case "L":
                        headXPosition = headXPosition - 1
                        break;
                    case "U":
                        headYPosition = headYPosition + 1
                        break;
                    case "D":
                        headYPosition = headYPosition - 1
                        break;
                }
                // for (let i = 0; i < amount-1; i++) {
                positionToString(headXPosition, headYPosition);
                if (!tailRange(tailXPosition, tailYPosition, headXPosition, headYPosition)) {
                    // console.log("I am not adjacent")
                    /**
                     * place tail position one behind the head, 
                     * if direction was up place -1 y
                     * if direction was down place +1 y
                     * if direction was right place -1 x
                     * if direction was left place +1 x
                     * if it is diagonal then it should be +1 x +1 y et al.
                    */
                    switch (key) {
                        case "R":
                            tailXPosition = headXPosition - 1
                            tailYPosition = headYPosition;
                            break;
                        case "L":
                            tailXPosition = headXPosition + 1
                            tailYPosition = headYPosition;
                            break;
                        case "U":
                            tailYPosition = headYPosition - 1
                            tailXPosition = headXPosition;
                            break;
                        case "D":
                            tailYPosition = headYPosition + 1
                            tailXPosition = headXPosition;
                            break;
                    }
                }

                positionsVisited.push(positionToString(tailXPosition, tailYPosition))
                // console.log(positionsVisited)
            }

        })
        // console.log("SLUTET ÄR NÄRA");

        positionsVisited = [...new Set(positionsVisited)]
        // console.log(positionsVisited)
        // console.log(positionsVisited.length)

        return positionsVisited.length
    },
    part2(file: string): number {
        // Implementation
        // some sort of linked list?
        interface LinkedList {
            positionX: number,
            positionY: number,
            visitedPositions: [],
            child: LinkedList | null
        }
        let head: LinkedList = {
            positionX: 0,
            positionY: 0,
            visitedPositions: [],
            child: null
        }
        for (let i = 0; i < 9; i++) {
                        
        }

        return 0
    },

};

function tailRange(tailX: number, tailY: number, headX: number, headY: number, range: number = 1): boolean {
    let xInterval = [headX + range, headX, headX - range]
    let yInterval = [headY + range, headY, headY - range]
    if (xInterval.includes(tailX) && yInterval.includes(tailY)) {
        return true
    }
    return false
}
function positionToString(x: number, y: number): string {
    return `${x},${y}`
}