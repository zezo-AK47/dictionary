from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import time

def test():
    driver = webdriver.Chrome()
    
    driver.get("http://localhost/")
    
    terms = []
    
    with open("terms.txt", "rb") as terms_txt:
        for term in terms_txt:
            terms.append(term)
    
    term_field = driver.find_element(By.ID, "term")
    translation_field = driver.find_element(By.ID, "translation")
    defintion_field = driver.find_element(By.ID, "definition")
    print(term_field)
    
    WebDriverWait(driver, 10).until(EC.url_changes("http://localhost/insert.php"))
if __name__ == "__main__":
    test()
