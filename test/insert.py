from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import time

def test_click_button():
    driver = webdriver.Chrome() # Or .Firefox(), .Edge(), etc.

    # 1. Open a webpage with a button.  I'll use a simple example.
    driver.get("http://localhost/")
    # 3. Find the button.
    button = driver.find_element(By.ID, "explore")

    # 4. Click the button!
    button.click()
    
    # 5. make sure the title changed to "Search Term" 
    WebDriverWait(driver, 10).until(EC.url_changes("http://localhost/search.php"))
    if driver.title == "Insert Term":
        print("Test Passed: Title changed")
    else:
        print("Test Failed: Title did not change as expected.")
    
    driver.quit()

if __name__ == "__main__":
    test_click_button()
