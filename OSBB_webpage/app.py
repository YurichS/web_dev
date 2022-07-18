from flask import Flask, render_template, request, redirect, url_for
import pyodbc as pdb

app = Flask(__name__)


def db_connection():
    db_conection = pdb.connect('Driver={SQL Server};'
                               'Server=PC-HOME;'
                               'Database=osbb_info;'
                               'Trusted_Connection=yes;')
    return db_conection


def debtors_info():
    cursor = db_connection().cursor()
    cursor.execute("select * from debtor_inf order by debt desc")
    return cursor.fetchall()


def qa_message(surname, name, flat_num, email, message):
    cnxn = db_connection()
    cursor = cnxn.cursor()
    cursor.execute(f"insert into messages values ('{surname}', '{name}', {flat_num}, '{email}', '{message}')")
    cnxn.commit()


@app.route('/', methods=['POST', 'GET'])
def main():
    return render_template('index.html', info=debtors_info())


@app.route('/qa', methods=['POST', 'GET'])
def QA():
    check = True
    if request.method == 'POST':
        surname = request.form.get('surname')
        name = request.form.get('name')
        flat_num = request.form.get('flat_num')
        email = request.form.get('email')
        message = request.form.get('message')
        if not surname or not name or not flat_num or not email or not message or not request.form.getlist(
                'agree'):
            return render_template('qa_error.html', surname=surname, name=name, flat_num=flat_num, email=email,
                                   message=message)
        else:
            qa_message(surname, name, flat_num, email, message)
            return redirect(url_for('main'))
    return render_template('qa_form.html', check=check)


if __name__ == '__main__':
    app.run()
