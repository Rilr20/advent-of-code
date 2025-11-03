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
            let key: string = row.split(" ")[0]
            let amount: number = parseInt(row.split(" ")[1])
            for (let i = 0; i < amount; i++) {
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
                positionToString(headXPosition, headYPosition);
                if (!tailRange(tailXPosition, tailYPosition, headXPosition, headYPosition)) {
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
            }

        })

        positionsVisited = [...new Set(positionsVisited)]

        return positionsVisited.length
    },
    part2(file: string): number {
        const tailLength = 1

        // Implementation
        // some sort of linked list?
        interface LinkedList {
            positionX: number,
            positionY: number,
            visitedPositions: string[],
            child: LinkedList | null
        }
        let head: LinkedList = {
            positionX: 0,
            positionY: 0,
            visitedPositions: [],
            child: null
        }
        for (let i = 0; i < tailLength; i++) {
            const nextNode: LinkedList = {
                positionX: 0,
                positionY: 0,
                visitedPositions: [],
                child: null
            }
            if (head.child === null) {
                head.child = nextNode
            } else {
                let currentNode = head;
                while (currentNode.child !== null) {
                    currentNode = currentNode.child
                }
                currentNode.child = nextNode
            }
        }

        let rows = file.split("\n")
        
        rows.forEach(row => {
            let key: string = row.split(" ")[0]
            let amount: number = parseInt(row.split(" ")[1])
            for (let i = 0; i < amount; i++) {
                
                switch (key) {
                    case "R":
                        head.positionX = head.positionX + 1
                        break;
                    case "L":
                        head.positionX = head.positionX - 1
                        break;
                    case "U":
                        head.positionY = head.positionY + 1
                        break;
                    case "D":
                        head.positionY = head.positionY - 1
                        break;
                }
                // let currentHead = head;
                head.visitedPositions.push(positionToString(head.positionX, head.positionY))


                moveChildren(head.child, key, head);
            }
        })
        let visitedPositions: string[] = []
        // let i = 1;
        let currentHead:any = head
        for (let i = 0; i <= tailLength; i++) {
            console.log(`Hierachy level ${i}:`);
            console.log(currentHead.visitedPositions);

            currentHead = currentHead.child
        }
        // console.log("head");
        // console.log(head);
        
        
        return visitedPositions.length
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
function diagonal(tailX: number, tailY: number, headX: number, headY: number, direction: string, range: number = 1): string {

    // Might destroy something idk 
    switch (direction) {
        case "R":
            headX = headX - 1
            break;
        case "L":
            headX = headX + 1
            break;
        case "U":
            headY = headY - 1
            break;
        case "D":
            headY = headY + 1
    }

    let xInterval = [headX + range, headX - range]
    let yInterval = [headY + range, headY - range]

    
    if (tailX == xInterval[0] && tailY == yInterval[0]) {
        
        return "UR"
    }
    if (tailX == xInterval[1] && tailY == yInterval[1]) {
        return "DL"
    }
    if (tailX == xInterval[0] && tailY == yInterval[1]) {
        return "DR"
    }
    if (tailX == xInterval[1] && tailY == yInterval[0]) {
        return "UL"
    }
    return ""
}
function positionToString(x: number, y: number): string {
    return `${x},${y}`
}
function diagonalCode(child: { positionX: number; positionY: number; }, key:string) {
    switch (key) {
        case "UR":
            child.positionX = child.positionX + 1
            child.positionY = child.positionY + 1
            break;
        case "DL":
            child.positionX = child.positionX - 1
            child.positionY = child.positionY - 1
            break;
        case "DR":
            child.positionX = child.positionX + 1
            child.positionY = child.positionY - 1
            break;
        case "UL":
            child.positionX = child.positionX - 1
            child.positionY = child.positionY + 1
            break;
        default:
            break;
    }
}
function moveChildren(child: any, direction: string, parent: any): void {
    // If tail is not in range move it
    if (!tailRange(child.positionX, child.positionY, parent.positionX, parent.positionY)) {

        let diagonalDirection = diagonal(child.positionX, child.positionY, parent.positionX, parent.positionY, direction)
        console.log("what is the diagoal:" + diagonalDirection + " it is this!"); // returns nothing
        
        switch (direction) {
            case "R":
                if (diagonalDirection !== "") {
                    diagonalCode(child, diagonalDirection)
                } else {
                    child.positionX = child.positionX + 1
                }
                // child.positionY = parent.positionY;
                break;
            case "L":
                if (diagonalDirection !== "") {
                    diagonalCode(child, diagonalDirection)
                } else {
                    child.positionX = child.positionX - 1
                }
                // child.positionY = parent.positionY;
                break;
            case "U":
                if (diagonalDirection !== "") {
                    diagonalCode(child, diagonalDirection)
                } else {
                    child.positionY = child.positionY + 1
                }
                // child.positionX = parent.positionX;
                break;
            case "D":
                if (diagonalDirection !== "") {
                    diagonalCode(child, diagonalDirection)
                } else {
                    child.positionY = child.positionY - 1
                }
                // child.positionX = parent.positionX;
                break;
        }
    }

    child.visitedPositions.push(positionToString(child.positionX, child.positionY))
    if (child.child !== null) {
        moveChildren(child.child, direction, child);
    }
}