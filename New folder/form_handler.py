from flask import Flask, request
import sqlite3

app = Flask(__name__)

def create_table():
    conn = sqlite3.connect('duplicate_check.db')
    cursor = conn.cursor()
    cursor.execute('CREATE TABLE IF NOT EXISTS datas (id INTEGER PRIMARY KEY, name TEXT, email TEXT, query TEXT)')
    conn.commit()
    conn.close()

create_table()

@app.route('/submit_form', methods=['POST'])
def submit_form():
    if request.method == 'POST':
        name = request.form['name']
        email = request.form['email']
        query = request.form['query']

        conn = sqlite3.connect('form_data.db')
        cursor = conn.cursor()
        cursor.execute('INSERT INTO datas (name, email, query) VALUES (?, ?, ?)', (name, email, query))
        conn.commit()
        conn.close()

        return 'Thank you for your submission!'

if __name__ == '__main__':
    app.run(debug=True)
