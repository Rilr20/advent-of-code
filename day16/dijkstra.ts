/**
 * Create Normal dijkstra before converting it to function in 2D-array :D
 */

let Vertex = 9;

function minDistance(dist:number[], sptSet:boolean[]) {
    let min = Number.MAX_VALUE
    let min_index = -1

    for (let v = 0; v < Vertex; v++) {
        if (sptSet[v] == false && dist[v] <= min) {
            min = dist[v]
            min_index = v
        }
    }
    return min_index
}

function print(dist:number[]) {
    console.log("Vertex Distance from source: \n");
    for (let i = 0; i < Vertex; i++) {
        console.log(`${i}  ${dist[i]}`);
                
    }   
}

function dijkstra(graph:number[][], src:number) {
    let dist = new Array(Vertex)
    let sptSet = new Array(Vertex)

    for (let i = 0; i < Vertex; i++) {
        dist[i] = Number.MAX_VALUE;
        sptSet[i] = false
    }

    dist[src] = 0

    for (let count = 0; count < Vertex - 1; count++) {
        let u = minDistance(dist, sptSet)

        sptSet[u] = true

        for (let v = 0; v < Vertex; v++) {
            if (!sptSet[v]&& graph[u][v] != 0 && dist[u] != Number.MAX_VALUE && dist[u] + graph[u][v] < dist[v]){
                dist[v] = dist[u] + graph[u][v]
            }
        }
    }

    print(dist);
}


let graph = [[0, 4, 0, 0, 0, 0, 0, 8, 0],
        [4, 0, 8, 0, 0, 0, 0, 11, 0],
        [0, 8, 0, 7, 0, 4, 0, 0, 2],
        [0, 0, 7, 0, 9, 14, 0, 0, 0],
        [0, 0, 0, 9, 0, 10, 0, 0, 0],
        [0, 0, 4, 14, 10, 0, 2, 0, 0],
        [0, 0, 0, 0, 0, 2, 0, 1, 6],
        [8, 11, 0, 0, 0, 0, 1, 0, 7],
        [0, 0, 2, 0, 0, 0, 6, 7, 0]]
dijkstra(graph, 0);
