def get_files(file_path):
    try:
        with open(file_path, 'r', encoding='utf-8') as file:
            lines = [line.strip() for line in file]
        return lines
    except FileNotFoundError:
        print(f"Error: File not found at '{file_path}'")
        return []
    except Exception as e:
        print(f"An error occurred: {e}")
        return []

def write_to_file(file_path, data_list):
    i = 0
    global number
    number = []
    try:
        with open(file_path, 'w', encoding='utf-8') as file:
            for item in data_list:
                i += 1
                number.append(i)
                file.write(f"{item}\n")
            print(f"Successfully wrote {len(data_list)} lines to '{file_path}'")
    except Exception as e:
        print(f"An error occurred while writing to the file: {e}")


terms = get_files("e:\\xampp\\htdocs\\test\\terms.txt")
translation = get_files("e:\\xampp\\htdocs\\test\\translation.txt")
definition = get_files("e:\\xampp\\htdocs\\test\\definition.txt")

write_to_file("e:\\xampp\\htdocs\\test\\output\\terms.txt", terms)
write_to_file("e:\\xampp\\htdocs\\test\\output\\translation.txt", translation)
write_to_file("e:\\xampp\\htdocs\\test\\output\\definition.txt", definition)
write_to_file("e:\\xampp\\htdocs\\test\\output\\number.txt", number)