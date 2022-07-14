from flask import Flask, render_template, request
import pyodbc as pdb

app = Flask(__name__)


def info():
    db_conection = pdb.connect('Driver={SQL Server};'
                               'Server=PC-HOME;'
                               'Database=debtors;'
                               'Trusted_Connection=yes;')
    cursor = db_conection.cursor()
    cursor.execute("select * from debtor_inf order by debt desc")
    return cursor.fetchall()


@app.route('/', methods=['POST', 'GET'])
def main():
    return render_template('index.html', info=info())


@app.route('/qa', methods=['POST', 'GET'])
def QA():
    check = True
    if request.method == 'POST':
        surname = request.form.get('surname')
        name = request.form.get('name')
        flat_num = request.form.get('flat_num')
        email = request.form.get('email')
        message = request.form.get('message')
        print(not email)
        if not surname or not name or not flat_num or not email or not message or not request.form.getlist(
                'agree'):
             return render_template('qa_error.html', surname=surname, name=name, flat_num=flat_num, email=email,
                            message=message)

    return render_template('qa_form.html', check=check)


if __name__ == '__main__':
    app.run()
