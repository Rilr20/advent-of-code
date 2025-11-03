use std::fs::File;
use std::io::prelude::*;
fn main() {
    let file_path = "./input.txt";

    let mut file = File::open(file_path).expect("Can't Open File!");
    let mut contents = String::new();

    file.read_to_string(&mut contents)
        .expect("Oops can't read file sadface :(");

    // contents = contents.trim_start_matches('\u{feff}').to_string();

    let split = contents.split("\n");
    let rows: Vec<&str> = split.collect();
    let mut subroutine = String::new();
    let mut res:bool = false;
    let mut i = 0;
    for char in rows[0].chars() {
        // println!("{}", char);
        // subroutine = subroutine.to_owned() + &char.to_string();
        // if subroutine.len() == 4{
        //     res = all_unique(&subroutine);
        //     if res {
        //         println!("{}",subroutine);
        //     }
        //     subroutine = "".to_owned();
        // }
        // if res {
        //     break;
        // }
        find_3_ahead(i, rows[0]);
        i+=1;
    }

}
fn find_3_ahead(char_position:u32, data:&str)->&str {
    if char_position as usize+3 < data.len() {
        return &data[char_position as usize..char_position as usize+3]
    }
    return "";
} 
fn all_unique(string:&String)->bool {
    for char in string.chars() {
        // println!("{}",string.matches(char).count()>1);
        if string.matches(char).count()>1 {
            return false
        }
    }
    return true
}

